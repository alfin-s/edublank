<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\KategoriUmkm;
use App\Models\Produk;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index(Request $request, $kategoriId = null)
    {
        // Ambil data UMKM berdasarkan kategori tertentu jika parameter kategori disertakan
        $umkms = Umkm::when($kategoriId, function ($query, $kategoriId) {
            return $query->whereHas('kategori', function ($subquery) use ($kategoriId) {
                $subquery->where('kategori_umkm', $kategoriId);
            });
        })->get();

        // Ambil semua kategori
        $kategori = KategoriUmkm::all();
        $produk = Produk::all();

        // Format harga pada setiap objek produk
        foreach ($produk as $item) {
            $item->formatted_harga = number_format($item->harga, 0, ',', '.');
        }

        // Render view dengan umkms dan kategori
        return view('frontend.index', compact('umkms', 'kategori', 'produk'));
    }

    public function umkms(Request $request, $kategoriId = null)
    {
        // Ambil data UMKM berdasarkan kategori tertentu jika parameter kategori disertakan
        $umkms = Umkm::when($kategoriId, function ($query, $kategoriId) {
            return $query->whereHas('kategori', function ($subquery) use ($kategoriId) {
                $subquery->where('kategori_umkm', $kategoriId);
            });
        })->get();

        // Ambil semua kategori
        $kategori = KategoriUmkm::all();
        $produk = Produk::all();

        // Format harga pada setiap objek produk
        foreach ($produk as $item) {
            $item->formatted_harga = number_format($item->harga, 0, ',', '.');
        }

        // Render view dengan umkms dan kategori
        return view('frontend.umkms', compact('umkms', 'kategori', 'produk'));
    }


}
