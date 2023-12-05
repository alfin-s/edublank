<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;

use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    public function index()
    {
        //get umkm
        $kategori = KategoriProduk::latest()->get();

        //render view with umkm
        return view('admin/produk.kategori', compact('kategori'));
    }
    public function create()
    {
        return view('admin/produk.tambah-kategori');
    }


    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            
            'kategori_produk'     => 'required',

        ]);

        //create post
        KategoriProduk::create([
            'kategori_produk'     => $request->kategori_produk,
        ]);

        session()->flash('status','Kategori Produk Berhasil Ditambahkan!');

        //redirect to index
        return redirect()->route('kategori-produk.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function  edit(Request $request, $id){

        $kategori = KategoriProduk::findOrFail($id);

        // dd ($produk);
        return view ('admin/produk.edit-kategori', compact('kategori'));
    }

    public function update(Request $request, $id)
    {

        $kategori = KategoriProduk::find($id);

        //validate form
        $this->validate($request, [
            
            'kategori_produk'   => 'required',

        ]);

            //update post without image
            $kategori->update([
                'kategori_produk'   => $request->kategori_produk,
                ]);

        session()->flash('status','Kategori Produk Berhasil Diubah!');
        //redirect to index
        return redirect()->route('kategori-produk.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
    // Temukan kategori UMKM berdasarkan ID
    $kategoriProduk = KategoriProduk::find($id);

    // Hapus relasi dengan UMKM langsung menggunakan nama kolom kunci asing
    Produk::where('kategori_produk', $kategoriProduk->id)->delete();

    // Hapus kategori UMKM
    $kategoriProduk->delete();

        session()->flash('status','Kategori Produk Berhasil Dihapus');
        //redirect to index
        return redirect()->route('kategori-umkm.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
