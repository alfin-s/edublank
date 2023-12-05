<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\KategoriProduk;
use App\Models\Umkm;
use Illuminate\Support\Facades\DB;
use Session;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        //get umkm
        $produks = Produk::latest()->get();

        //render view with umkm
        return view('admin/produk.data-produk', compact('produks'));
    }

    public function create()
    {
        $umkms = Umkm::all();
        $kategori = KategoriProduk::all();
        return view('admin/produk.tambah', compact('umkms', 'kategori'));
    }


    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            
            'nama_produk'     => 'required',
            'nama_umkm'   => 'required',
            'kategori_produk'   => 'required',
            'harga'   => 'required',
            'deskripsi'   => 'required',
            'gambar'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        //upload image
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/produk', $gambar->hashName());

        //create post
        Produk::create([
            'nama_produk'     => $request->nama_produk,
            'nama_umkm'   => $request->nama_umkm,
            'kategori_produk'   => $request->kategori_produk,
            'harga'   => $request->harga,
            'deskripsi'   => $request->deskripsi,
            'gambar'     => $gambar->hashName()
        ]);

        session()->flash('status','Produk Berhasil Ditambahkan');

        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function  edit(Request $request, $id){

        $produk = Produk::findOrFail($id);
        
        $umkms = Umkm::all();

        $kategori = KategoriProduk::all();

        // dd ($produk);
        return view ('admin/produk.edit', compact('produk', 'kategori', 'umkms'));
    }

    // public function edit(Umkm $umkms)
    // {
    //     return view('admin/umkm.edit', compact('umkms'));
    // }

    public function update(Request $request, $id)
    {

        $produk = Produk::find($id);

        //validate form
        $this->validate($request, [
            
            'nama_produk'     => 'required',
            'nama_umkm'   => 'required',
            'kategori_produk'   => 'required',
            'harga'   => 'required',
            'deskripsi'   => 'required',
            'gambar'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        //check if image is uploaded
        if ($request->hasFile('gambar')) {

            //upload new image
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/produk', $gambar->hashName());

            //delete old image
            Storage::delete('public/produk/'.$produk->gambar);

            //update post with new image
            $produk->update([
                'nama_produk'     => $request->nama_produk,
                'nama_umkm'   => $request->nama_umkm,
                'kategori_produk'   => $request->kategori_produk,
                'harga'   => $request->harga,
                'deskripsi'   => $request->deskripsi,
                'gambar'     => $gambar->hashName()
            ]);

        } else {

            //update post without image
            $produk->update([
                'nama_produk'     => $request->nama_produk,
                'nama_umkm'   => $request->nama_umkm,
                'kategori_produk'   => $request->kategori_produk,
                'harga'   => $request->harga,
                'deskripsi'   => $request->deskripsi
                ]);
        }

        session()->flash('status','Produk Berhasil Diubah!');
        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Produk $produk)
    {
        //delete image
        Storage::delete('public/produk/'. $produk->gambar);

        //delete post
        $produk->delete();

        session()->flash('status','Produk Berhasil Dihapus');
        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

//     public function destroy(Produk $produk)
// {
//     // Pemeriksaan apakah ada kategori terkait
//     if ($produk->kategori()->exists()) {
//         // Jika ada, berikan pesan kesalahan dan redirect
//         return redirect()->route('produk.index')->with(['error' => 'Tidak dapat menghapus Produk. Terdapat Kategori Produk terkait.']);
//     }

//     // Jika tidak ada kategori terkait, lanjutkan dengan penghapusan
//     // Hapus gambar
//     Storage::delete('public/produk/'. $produk->gambar);

//     // Hapus produk
//     $produk->delete();

//     session()->flash('status','Produk Berhasil Dihapus');

//     // Tampilkan pesan sukses dan redirect ke index
//     return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Dihapus!']);
// }


}
