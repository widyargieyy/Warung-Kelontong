<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $datas = [
            'dataKategori' => Kategori::latest()->get(),
            'totalKategori' => Kategori::count(),
        ];
        return view('admin.kategori.index', $datas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategoris,nama_kategori|max:100',
            'deskripsi' => 'nullable|max:255',
        ]);

        Kategori::create($request->all());

        return redirect()->route('admin.data-kategori')->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|unique:kategoris,nama_kategori,' . $id . '|max:100',
            'deskripsi' => 'nullable|max:255',
        ]);

        $kategori->update($request->all());

        return redirect()->route('admin.data-kategori')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.data-kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}