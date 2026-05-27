<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return view('admin.supplier.index', [
            'dataSupplier'  => Supplier::withCount('barang')->latest()->get(),
            'totalSupplier' => Supplier::count(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required|unique:suppliers,nama_supplier|max:100',
            'no_hp'         => 'required|max:20',
            'alamat'        => 'nullable|max:255',
        ]);

        Supplier::create($request->all());

        return redirect()->route('admin.data-supplier')
            ->with('success', 'Supplier baru berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);

        $request->validate([
            'nama_supplier' => 'required|unique:suppliers,nama_supplier,' . $id . '|max:100',
            'no_hp'         => 'required|max:20',
            'alamat'        => 'nullable|max:255',
        ]);

        $supplier->update($request->all());

        return redirect()->route('admin.data-supplier')
            ->with('success', 'Data supplier berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('admin.data-supplier')
            ->with('success', 'Supplier berhasil dihapus!');
    }
}