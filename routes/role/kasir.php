<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\RiwayatTransaksiController;

Route::prefix('kasir')
    ->name('kasir.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'toDashboardKasir'])->name('dashboard');
        Route::get('/transaksi', [PenjualanController::class, 'kasirTransaksi'])->name('transaksi');

        // Cart routes (POST/DELETE agar tidak ter-cache browser)
        Route::post('/cart/add', [PenjualanController::class, 'addToCart'])->name('cart.add');
        Route::post('/cart/update', [PenjualanController::class, 'updateCart'])->name('cart.update');
        Route::post('/cart/remove', [PenjualanController::class, 'removeFromCart'])->name('cart.remove');
        Route::post('/cart/clear', [PenjualanController::class, 'clearCart'])->name('cart.clear');
        Route::get('/cart', [PenjualanController::class, 'getCart'])->name('cart.get');

        // Simpan transaksi
        Route::post('/simpan', [PenjualanController::class, 'simpanTransaksi'])->name('simpan');

        Route::get('/riwayat-transaksi', [RiwayatTransaksiController::class, 'index'])->name('riwayat-transaksi');
        Route::get('/riwayat-transaksi/detail/{id}', [RiwayatTransaksiController::class, 'detailTransaksi'])->name('riwayat-transaksi.detail');
    });