<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\KategoriUmkm;
use App\Models\Produk;
use App\Models\KategoriProduk;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $umkm = Umkm::count();
        $kategoriUmkm = KategoriUmkm::count();
        $produk = Produk::count();
        $kategoriProduk = KategoriProduk::count();

        //render view with umkm
        return view('admin.dashboard', compact('umkm','kategoriUmkm','produk','kategoriProduk'));

    }

    public function umkm()
    {


        $produk = Produk::count();
        $kategoriProduk = KategoriProduk::count();

        //render view with umkm
        return view('admin.dashboard', compact('produk','kategoriProduk'));

    }

}
