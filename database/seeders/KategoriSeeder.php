<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_kategori' => 'Makanan Instan',
                'deskripsi' => 'Produk mie dan makanan instan'
            ],
            [
                'nama_kategori' => 'Minuman',
                'deskripsi' => 'Minuman kemasan'
            ],
            [
                'nama_kategori' => 'Snack',
                'deskripsi' => 'Makanan ringan'
            ],
            [
                'nama_kategori' => 'Sembako',
                'deskripsi' => 'Kebutuhan pokok'
            ]
        ];

        foreach ($data as $item) {
            Kategori::create($item);
        }
    }
}