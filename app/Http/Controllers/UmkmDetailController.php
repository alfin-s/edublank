<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\KategoriUmkm;
use App\Models\Produk;

use Illuminate\Http\Request;

class UmkmDetailController extends Controller
{

    // public function index(Request $request, $kategoriId = null)
    // {
    //     // Ambil data UMKM berdasarkan kategori tertentu jika parameter kategori disertakan
    //     $umkmsQuery = Umkm::when($kategoriId, function ($query, $kategoriId) {
    //         return $query->whereHas('kategori', function ($subquery) use ($kategoriId) {
    //             $subquery->where('kategori_umkm', $kategoriId);
    //         });
    //     });

    //     // Menggunakan pagination untuk membatasi jumlah data yang diambil
    //     $umkms = $umkmsQuery->paginate(3); // Sesuaikan jumlah item per halaman sesuai kebutuhan

    //     // Ambil semua kategori
    //     $kategori = KategoriUmkm::all();

    //     // Render view dengan umkms dan kategori
    //     return view('frontend.umkms', compact('umkms', 'kategori'));
    // }

    // public function show(string $id)
    // {
    //     $umkms = Umkm::find($id);
    //     $kategori = KategoriUmkm::all();
    //     $produk = Produk::all();
    //     return view('frontend.umkm-detail', compact('umkms', 'kategori', 'produk'));
    // }

    public function show(string $id)
    {
        // Ambil data UMKM berdasarkan ID
        $umkms = Umkm::find($id);

        // Ambil data produk berdasarkan nama umkm
        $produk = Produk::all();

        // $produk = Produk::all();

        // Ambil semua kategori
        $kategori = KategoriUmkm::all();

        // Kirim data umkm, produk, dan kategori ke tampilan
        return view('frontend.umkm-detail', compact('umkms', 'produk', 'kategori'));
    }
}
