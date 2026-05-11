<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

    protected $fillable = [
        'nama_supplier',
        'no_hp',
        'alamat',
    ];

    // Relasi ke barang
    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    // Relasi ke stok masuk
    public function stokMasuk()
    {
        return $this->hasMany(StokMasuk::class);
    }
}