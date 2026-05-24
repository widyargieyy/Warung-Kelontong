<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\Supplier;
use App\Models\User;
use App\Models\StokMasuk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function toDashboardAdmin()
    {
        $datas = [
            'dataPenjualan' => Penjualan::with('user')->latest()->take(10)->get(),
            'totalBarang' => Barang::count(),
            'totalSupplier' => Supplier::count(),
            'totalKasir' => User::where('role', 'kasir')->count(),
            'totalPenjualanHariIni' => Penjualan::whereDate('tanggal_penjualan', Carbon::today())->count(),
            'totalBarangHabis' => Barang::where('stok', '<=', 0)->count(),
            'totalStokMasukHariIni' => StokMasuk::whereDate('tanggal_masuk', Carbon::today())->count(),
        ];
        return view('admin.dashboard.index', $datas);
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