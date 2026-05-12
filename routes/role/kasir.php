<?php 

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('kasir')->name('kasir.')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'toDashboardKasir'])->name('dashboard');
});