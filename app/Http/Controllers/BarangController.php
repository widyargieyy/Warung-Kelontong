<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $datas = [
            'dataBarang' => Barang::all(),
            'totalBarang' => Barang::count(),
        ];
        return view('kasir.penjualan.barang', $datas);
    }

    public function detailBarang($id)
    {
        $barang = Barang::with(['kategori', 'supplier'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => [
                'kode_barang' => $barang->kode_barang,
                'nama_barang' => $barang->nama_barang,
                'kategori' => $barang->kategori->nama_kategori ?? '-',
                'supplier' => $barang->supplier->nama_supplier ?? '-',
                'harga_jual' => 'Rp ' . number_format($barang->harga_jual, 0, ',', '.'),
                'harga_beli' => 'Rp ' . number_format($barang->harga_beli, 0, ',', '.'),
                'stok' => $barang->stok,
                'satuan' => $barang->satuan ?? '-',
                'stok_status' => $barang->stok > 10 ? 'aman' : ($barang->stok > 0 ? 'menipis' : 'habis'),
            ],
        ]);
    }
}