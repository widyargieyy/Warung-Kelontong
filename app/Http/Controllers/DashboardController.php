<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function toDashboardAdmin()
    {
        return view('admin.dashboard.index');
    }

    public function toDashboardKasir()
    {
        return view('kasir.dashboard.index');
    }
}