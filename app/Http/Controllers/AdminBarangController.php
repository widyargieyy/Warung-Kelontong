<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Http\Request;

class AdminBarangController extends Controller
{
    public function index()
    {
        $datas = [
            'dataBarang' => Barang::latest()->get(),
            'totalBarang' => Barang::count(),
            'dataKategori' => Kategori::all(),
            'dataSupplier' => Supplier::all(),
        ];
        return view('admin.barang.index', $datas);
    }

    public function show($id)
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

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'kode_barang' => 'required|unique:barangs,kode_barang|max:50',
            'nama_barang' => 'required|max:100',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|max:20',
        ]);

        Barang::create($request->all());

        return redirect()->route('admin.data-barang')->with('success', 'Barang baru berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'kode_barang' => 'required|unique:barangs,kode_barang,' . $id . '|max:50',
            'nama_barang' => 'required|max:100',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|max:20',
        ]);

        $barang->update($request->all());

        return redirect()->route('admin.data-barang')->with('success', 'Data barang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('admin.data-barang')->with('success', 'Barang berhasil dihapus!');
    }
}