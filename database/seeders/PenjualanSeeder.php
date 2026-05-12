<?php

namespace Database\Seeders;

use App\Models\Penjualan;
use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        Penjualan::create([
            'user_id' => 2,
            'tanggal_penjualan' => now(),
            'total_harga' => 12000,
            'uang_bayar' => 20000,
            'kembalian' => 8000,
        ]);

        Penjualan::create([
            'user_id' => 3,
            'tanggal_penjualan' => now(),
            'total_harga' => 15000,
            'uang_bayar' => 20000,
            'kembalian' => 5000,
        ]);
    }
}