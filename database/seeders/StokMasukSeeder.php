<?php

namespace Database\Seeders;

use App\Models\StokMasuk;
use Illuminate\Database\Seeder;

class StokMasukSeeder extends Seeder
{
    public function run(): void
    {
        StokMasuk::create([
            'barang_id' => 1,
            'supplier_id' => 1,
            'jumlah_masuk' => 20,
            'tanggal_masuk' => now(),
            'keterangan' => 'Restok mingguan',
        ]);

        StokMasuk::create([
            'barang_id' => 2,
            'supplier_id' => 3,
            'jumlah_masuk' => 10,
            'tanggal_masuk' => now(),
            'keterangan' => 'Tambah stok',
        ]);
    }
}