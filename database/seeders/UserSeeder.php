<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'no_hp' => '081234567890',
            'alamat' => 'Surabaya',
        ]);

        User::create([ 
            'nama' => 'Ahmad Kasir',
            'username' => 'kasir1',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir',
            'no_hp' => '081111111111',
            'alamat' => 'Sidoarjo',
        ]);

        User::create([
            'nama' => 'Dika Kasir',
            'username' => 'kasir2',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir',
            'no_hp' => '082222222222',
            'alamat' => 'Gresik',
        ]);
    }
}