<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\KategoriProduk;
use App\Models\Produk;

use Illuminate\Http\Request;

class ProdukDetailController extends Controller
{
    public function showProduk(string $id)
    {
        // Ambil data UMKM berdasarkan ID
        $produk = Produk::findOrFail($id);
        $kategori = KategoriProduk::all();

        // Kirim data umkm, produk, dan kategori ke tampilan
        return view('frontend.produk-detail', compact('produk', 'kategori'));
    }
}
