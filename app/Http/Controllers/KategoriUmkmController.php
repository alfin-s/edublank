<?php

namespace App\Http\Controllers;

use App\Models\KategoriUmkm;
use App\Models\Umkm;

use Illuminate\Http\Request;

class KategoriUmkmController extends Controller
{
    public function index()
    {
        //get umkm
        $kategori = KategoriUmkm::latest()->get();

        //render view with umkm
        return view('admin/umkm.kategori', compact('kategori'));
    }

    public function create()
    {
        return view('admin/umkm.tambah-kategori');
    }


    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            
            'kategori_umkm'     => 'required',

        ]);

        //create post
        KategoriUmkm::create([
            'kategori_umkm'     => $request->kategori_umkm,
        ]);

        session()->flash('status','Kategori UMKM Baru Berhasil Ditambahkan!');
        //redirect to index
        return redirect()->route('kategori-umkm.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function  edit(Request $request, $id){

        $kategori = KategoriUmkm::findOrFail($id);

        // dd ($produk);
        return view ('admin/umkm.edit-kategori', compact('kategori'));
    }

    public function update(Request $request, $id)
    {

        $kategori = KategoriUmkm::find($id);

        //validate form
        $this->validate($request, [
            
            'kategori_umkm'   => 'required',

        ]);

            //update post without image
            $kategori->update([
                'kategori_umkm'   => $request->kategori_umkm,
                ]);

        session()->flash('status','Kategori UMKM Berhasil Diubah!');
        //redirect to index
        return redirect()->route('kategori-umkm.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
    // Temukan kategori UMKM berdasarkan ID
    $kategoriUmkm = KategoriUmkm::find($id);

    // Hapus relasi dengan UMKM langsung menggunakan nama kolom kunci asing
    Umkm::where('kategori_umkm', $kategoriUmkm->id)->delete();

    // Hapus kategori UMKM
    $kategoriUmkm->delete();

        session()->flash('status','Kategori UMKM Berhasil Dihapus');
        //redirect to index
        return redirect()->route('kategori-umkm.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}
