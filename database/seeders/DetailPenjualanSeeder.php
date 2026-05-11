<?php

namespace Database\Seeders;

use App\Models\DetailPenjualan;
use Illuminate\Database\Seeder;

class DetailPenjualanSeeder extends Seeder
{
    public function run(): void
    {
        DetailPenjualan::create([
            'penjualan_id' => 1,
            'barang_id' => 1,
            'jumlah' => 2,
            'harga' => 3500,
            'subtotal' => 7000,
        ]);

        DetailPenjualan::create([
            'penjualan_id' => 1,
            'barang_id' => 2,
            'jumlah' => 1,
            'harga' => 5000,
            'subtotal' => 5000,
        ]);

        DetailPenjualan::create([
            'penjualan_id' => 2,
            'barang_id' => 3,
            'jumlah' => 1,
            'harga' => 9000,
            'subtotal' => 9000,
        ]);

        DetailPenjualan::create([
            'penjualan_id' => 2,
            'barang_id' => 1,
            'jumlah' => 2,
            'harga' => 3000,
            'subtotal' => 6000,
        ]);
    }
}