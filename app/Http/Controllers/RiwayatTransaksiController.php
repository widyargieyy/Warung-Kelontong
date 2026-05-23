<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatTransaksiController extends Controller
{
    public function index()
    {
        $datas = [
            'dataPenjualan' => Penjualan::with('user')
                ->where('user_id', Auth::id()) // kasir hanya lihat milik sendiri
                ->latest()
                ->paginate(10),
        ];
        return view('kasir.penjualan.riwayat', $datas);
    }

    public function detailTransaksi($id)
    {
        $penjualan = Penjualan::with(['user', 'detailPenjualan.barang'])->findOrFail($id);

        // Pastikan kasir hanya bisa lihat transaksi miliknya sendiri
        if ($penjualan->user_id !== Auth::id()) {
            return response()->json(['success' => false, 'message' => 'Akses ditolak.'], 403);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'kode' => 'TRX-' . str_pad($penjualan->id, 4, '0', STR_PAD_LEFT),
                'tanggal' => $penjualan->tanggal_penjualan->format('d M Y'),
                'jam' => $penjualan->tanggal_penjualan->format('H:i') . ' WIB',
                'kasir' => $penjualan->user->nama,
                'total_harga' => 'Rp ' . number_format($penjualan->total_harga, 0, ',', '.'),
                'uang_bayar' => 'Rp ' . number_format($penjualan->uang_bayar, 0, ',', '.'),
                'kembalian' => 'Rp ' . number_format($penjualan->kembalian, 0, ',', '.'),
                'items' => $penjualan->detailPenjualan->map(
                    fn($d) => [
                        'nama_barang' => $d->barang->nama_barang,
                        'jumlah' => $d->jumlah,
                        'harga' => 'Rp ' . number_format($d->harga, 0, ',', '.'),
                        'subtotal' => 'Rp ' . number_format($d->subtotal, 0, ',', '.'),
                    ],
                ),
            ],
        ]);
    }
}