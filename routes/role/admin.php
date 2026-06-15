<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminBarangController;
use App\Http\Controllers\AdminTransaksiController;

Route::prefix('admin')
    ->name('admin.')
    ->middleware('admin')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'toDashboardAdmin'])->name('dashboard');

        Route::get('/data-transaksi', [AdminTransaksiController::class, 'index'])->name('data-transaksi');
        Route::get('/data-transaksi/{id}', [AdminTransaksiController::class, 'detailTransaksi'])->name('data-transaksi.detail');

        Route::get('/data-barang', [AdminBarangController::class, 'index'])->name('data-barang');
        Route::get('/data-barang/{id}', [AdminBarangController::class, 'show'])->name('data-barang.show');
        Route::post('/data-barang', [AdminBarangController::class, 'store'])->name('data-barang.store');
        Route::put('/data-barang/{id}', [AdminBarangController::class, 'update'])->name('data-barang.update');
        Route::delete('/data-barang/{id}', [AdminBarangController::class, 'destroy'])->name('data-barang.destroy');

        Route::get('/data-kategori', [KategoriController::class, 'index'])->name('data-kategori');
        Route::post('/data-kategori', [KategoriController::class, 'store'])->name('data-kategori.store');
        Route::put('/data-kategori/{id}', [KategoriController::class, 'update'])->name('data-kategori.update');
        Route::delete('/data-kategori/{id}', [KategoriController::class, 'destroy'])->name('data-kategori.destroy');

        Route::get('/data-supplier', [SupplierController::class, 'index'])->name('data-supplier');
        Route::post('/data-supplier', [SupplierController::class, 'store'])->name('data-supplier.store');
        Route::put('/data-supplier/{id}', [SupplierController::class, 'update'])->name('data-supplier.update');
        Route::delete('/data-supplier/{id}', [SupplierController::class, 'destroy'])->name('data-supplier.destroy');
    });