<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    // ─── Halaman utama transaksi ──────────────────────────────────────────────
    public function kasirTransaksi()
    {
        $datas = [
            'dataBarang'  => Barang::latest()->get(),
            'totalBarang' => Barang::count() ?? 0,
        ];
        return view('kasir.penjualan.index', $datas);
    }

    // ─── Tambah barang ke cart (session) ─────────────────────────────────────
    public function addToCart(Request $request)
    {
        $barang = Barang::findOrFail($request->barang_id);
        $cart   = session()->get('cart', []);

        if (isset($cart[$barang->id])) {
            // Sudah ada → naikkan qty
            $cart[$barang->id]['qty'] += 1;
        } else {
            // Belum ada → masukkan baru
            $cart[$barang->id] = [
                'barang_id'   => $barang->id,
                'kode_barang' => $barang->kode_barang,
                'nama_barang' => $barang->nama_barang,
                'harga'       => $barang->harga_jual,
                'stok'        => $barang->stok,
                'qty'         => 1,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => $barang->nama_barang . ' ditambahkan ke keranjang.',
            'cart'    => $this->formatCart($cart),
        ]);
    }

    // ─── Update qty item di cart ──────────────────────────────────────────────
    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $id   = $request->barang_id;
        $qty  = (int) $request->qty;

        if (!isset($cart[$id])) {
            return response()->json(['success' => false, 'message' => 'Item tidak ditemukan.'], 404);
        }

        if ($qty <= 0) {
            unset($cart[$id]);
        } else {
            // Batasi qty agar tidak melebihi stok
            $cart[$id]['qty'] = min($qty, $cart[$id]['stok']);
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'cart'    => $this->formatCart($cart),
        ]);
    }

    // ─── Hapus satu item dari cart ────────────────────────────────────────────
    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $id   = $request->barang_id;

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return response()->json([
            'success' => true,
            'cart'    => $this->formatCart($cart),
        ]);
    }

    // ─── Reset / kosongkan cart ───────────────────────────────────────────────
    public function clearCart()
    {
        session()->forget('cart');

        return response()->json([
            'success' => true,
            'cart'    => $this->formatCart([]),
        ]);
    }

    // ─── Ambil isi cart (untuk refresh halaman) ───────────────────────────────
    public function getCart()
    {
        $cart = session()->get('cart', []);

        return response()->json([
            'success' => true,
            'cart'    => $this->formatCart($cart),
        ]);
    }

    // ─── Simpan transaksi ke database ─────────────────────────────────────────
    public function simpanTransaksi(Request $request)
    {
        $request->validate([
            'uang_bayar' => 'required|numeric|min:0',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return response()->json(['success' => false, 'message' => 'Keranjang masih kosong.'], 422);
        }

        $total = collect($cart)->sum(fn($item) => $item['harga'] * $item['qty']);

        if ($request->uang_bayar < $total) {
            return response()->json(['success' => false, 'message' => 'Uang bayar kurang dari total belanja.'], 422);
        }

        DB::beginTransaction();
        try {
            // 1. Simpan header penjualan
            $penjualan = Penjualan::create([
                'user_id'           => Auth::user()->id,
                'tanggal_penjualan' => now(),
                'total_harga'       => $total,
                'uang_bayar'        => $request->uang_bayar,
                'kembalian'         => $request->uang_bayar - $total,
            ]);

            // 2. Simpan detail & kurangi stok
            foreach ($cart as $item) {
                DetailPenjualan::create([
                    'penjualan_id' => $penjualan->id,
                    'barang_id'    => $item['barang_id'],
                    'jumlah'       => $item['qty'],
                    'harga'        => $item['harga'],
                    'subtotal'     => $item['harga'] * $item['qty'],
                ]);

                Barang::where('id', $item['barang_id'])
                      ->decrement('stok', $item['qty']);
            }

            // 3. Kosongkan cart
            session()->forget('cart');

            DB::commit();

            return response()->json([
                'success'      => true,
                'message'      => 'Transaksi berhasil disimpan!',
                'penjualan_id' => $penjualan->id,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    // ─── Helper: format cart untuk response JSON ──────────────────────────────
    private function formatCart(array $cart): array
    {
        $items = collect($cart)->values()->map(function ($item) {
            return [
                'barang_id'   => $item['barang_id'],
                'kode_barang' => $item['kode_barang'],
                'nama_barang' => $item['nama_barang'],
                'harga'       => $item['harga'],
                'harga_fmt'   => 'Rp ' . number_format($item['harga'], 0, ',', '.'),
                'stok'        => $item['stok'],
                'qty'         => $item['qty'],
                'subtotal'    => $item['harga'] * $item['qty'],
                'subtotal_fmt' => 'Rp ' . number_format($item['harga'] * $item['qty'], 0, ',', '.'),
            ];
        })->all();

        $total = collect($items)->sum('subtotal');

        return [
            'items'     => $items,
            'total'     => $total,
            'total_fmt' => 'Rp ' . number_format($total, 0, ',', '.'),
            'count'     => count($items),
        ];
    }
}