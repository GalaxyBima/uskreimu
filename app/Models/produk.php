<?php

namespace App\Models;


use App\Models\kategori;
use App\Models\transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produk extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function transaksis()
    {
        return $this->hasMany(transaksi::class,'id_produk');
    }

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori');
    }
}
