<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{


    protected $fillable = [
        'kategori_id',
        'supplier_id',
        'kode_barang',
        'nama_barang',
        'harga_beli',
        'harga_jual',
        'stok',
        'satuan',
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // Relasi ke supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // Relasi ke detail penjualan
    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class);
    }

    // Relasi ke stok masuk
    public function stokMasuk()
    {
        return $this->hasMany(StokMasuk::class);
    }
}