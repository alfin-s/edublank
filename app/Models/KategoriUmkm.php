<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriUmkm extends Model
{
    use HasFactory;
    // protected $table = 'kategori_umkm';
    // protected $primaryKey = "id";
    protected $fillable = [
        'kategori_umkm',
    ];

    public function umkm(){
        return $this->hasMany(Umkm::class);
    }


}
