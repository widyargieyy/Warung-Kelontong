<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'loginProses'])->name('login.proses');

Route::middleware(['auth'])->group(function () {

    require __DIR__.'/role/admin.php';
    require __DIR__.'/role/kasir.php';

});