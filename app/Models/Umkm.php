<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_umkm',
        'kategori_umkm',
        'deskripsi',
        'no_telp',
        'link_web',
        'link_instagram',
        'link_maps',
        'logo',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriUmkm::class, 'kategori_umkm', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'nama_umkm', 'id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'nama_umkm', 'id');
    }

}
