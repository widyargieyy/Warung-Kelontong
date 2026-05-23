<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function toDashboardAdmin()
    {
        return view('admin.dashboard.index');
    }

    public function toDashboardKasir()
    {
        $datas = [
            'dataPenjualan' => Penjualan::where('user_id', Auth::user()->id)->latest()->take(5)->get(),
            'totalBarang' => Barang::count(),
            'totalTransaksi' => Penjualan::where('user_id', Auth::user()->id)->count(),
            'totalBarangTersedia' => Barang::where('stok', '>', 0)->count(),
        ];
        
        return view('kasir.dashboard.index', $datas);
    }
}