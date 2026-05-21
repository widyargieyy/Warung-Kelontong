<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;


Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'toDashboardAdmin'])->name('dashboard');
    Route::resource('barang', BarangController::class);
});

    