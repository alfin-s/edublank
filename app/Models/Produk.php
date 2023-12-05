<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_produk',
        'nama_umkm',
        'kategori_produk',
        'harga',
        'deskripsi',
        'gambar',
    ];
    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_produk', 'id');
    }

    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'nama_umkm', 'id');
    }
}
