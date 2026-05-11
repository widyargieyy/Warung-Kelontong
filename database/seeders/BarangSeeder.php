<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'supplier_id' => 1,
                'kode_barang' => 'BRG001',
                'nama_barang' => 'Indomie Goreng',
                'harga_beli' => 2500,
                'harga_jual' => 3500,
                'stok' => 50,
                'satuan' => 'pcs',
            ],
            [
                'kategori_id' => 2,
                'supplier_id' => 3,
                'kode_barang' => 'BRG002',
                'nama_barang' => 'Aqua Botol',
                'harga_beli' => 3500,
                'harga_jual' => 5000,
                'stok' => 40,
                'satuan' => 'botol',
            ],
            [
                'kategori_id' => 3,
                'supplier_id' => 2,
                'kode_barang' => 'BRG003',
                'nama_barang' => 'Chitato',
                'harga_beli' => 7000,
                'harga_jual' => 9000,
                'stok' => 25,
                'satuan' => 'pcs',
            ],
            [
                'kategori_id' => 4,
                'supplier_id' => 2,
                'kode_barang' => 'BRG004',
                'nama_barang' => 'Beras 5 Kg',
                'harga_beli' => 60000,
                'harga_jual' => 70000,
                'stok' => 10,
                'satuan' => 'karung',
            ],
        ];

        foreach ($data as $item) {
            Barang::create($item);
        }
    }
}
