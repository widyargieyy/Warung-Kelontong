<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokMasuk extends Model
{

    protected $fillable = [
        'barang_id',
        'supplier_id',
        'jumlah_masuk',
        'tanggal_masuk',
        'keterangan',
    ];

    // Relasi ke barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    // Relasi ke supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}