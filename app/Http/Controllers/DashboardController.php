<?php

namespace App\Http\Controllers;

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
        $dataPenjualan = Penjualan::where('user_id', Auth::user()->id)->whereDate('tanggal_penjualan', now())->get();
        return view('kasir.dashboard.index', [
            'dataPenjualan' => $dataPenjualan
        ]);
    }
}