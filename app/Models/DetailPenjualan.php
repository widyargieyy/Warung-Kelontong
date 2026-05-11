<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
   
    protected $fillable = [
        'penjualan_id',
        'barang_id',
        'jumlah',
        'harga',
        'subtotal',
    ];

    // Relasi ke penjualan
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }

    // Relasi ke barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}