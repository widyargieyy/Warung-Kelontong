<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_supplier' => 'PT Indofood',
                'no_hp' => '081234567891',
                'alamat' => 'Jakarta'
            ],
            [
                'nama_supplier' => 'PT Wings Food',
                'no_hp' => '081234567892',
                'alamat' => 'Surabaya'
            ],
            [
                'nama_supplier' => 'PT Aqua',
                'no_hp' => '081234567893',
                'alamat' => 'Pasuruan'
            ]
        ];

        foreach ($data as $item) {
            Supplier::create($item);
        }
    }
}