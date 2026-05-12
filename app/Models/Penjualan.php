<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{

    protected $fillable = [
        'user_id',
        'tanggal_penjualan',
        'total_harga',
        'uang_bayar',
        'kembalian',
    ];

    // Relasi ke user (kasir/admin)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke detail penjualan
    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}