<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Umkm;
use App\Models\KategoriUmkm;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index()
    {
        //get umkm
        $umkms = Umkm::all();


        //render view with umkm
        return view('admin/umkm.data-umkm', compact('umkms'));
    }

    public function create()
    {
        $kategori = KategoriUmkm::all();
        return view('admin/umkm.tambah', compact('kategori'));
    }


    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            
            'nama_umkm'     => 'required',
            'kategori_umkm'   => 'required',
            'deskripsi'   => 'required',
            'no_telp'   => 'required',
            'link_web'   => 'required',
            'link_instagram'   => 'required',
            'link_maps'   => 'required',
            'logo'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        //upload image
        $logo = $request->file('logo');
        $logo->storeAs('public/umkm', $logo->hashName());

        //create post
        Umkm::create([
            'nama_umkm'     => $request->nama_umkm,
            'kategori_umkm'   => $request->kategori_umkm,
            'deskripsi'   => $request->deskripsi,
            'no_telp'   => $request->no_telp,
            'link_web'   => $request->link_web,
            'link_instagram'   => $request->link_instagram,
            'link_maps'   => $request->link_maps,
            'logo'     => $logo->hashName()
        ]);

        session()->flash('status','UMKM Baru Berhasil Ditambahkan!');
        //redirect to index
        return redirect()->route('umkm.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function  edit(Request $request, $id){

        $umkms = Umkm::findOrFail($id);
        
        $kategori = KategoriUmkm::all();

        // dd ($produk);
        return view ('admin/umkm.edit', compact('umkms', 'kategori'));
    }

    // public function edit(Umkm $umkms)
    // {
    //     return view('admin/umkm.edit', compact('umkms'));
    // }

    public function update(Request $request, $id)
    {

        $umkms = Umkm::find($id);

        //validate form
        $this->validate($request, [
            
            'nama_umkm'     => 'required',
            'kategori_umkm'   => 'required',
            'deskripsi'   => 'required',
            'no_telp'   => 'required',
            'link_web'   => 'required',
            'link_instagram'   => 'required',
            'link_maps'   => 'required',
            'logo'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        //check if image is uploaded
        if ($request->hasFile('logo')) {

            //upload new image
            $logo = $request->file('logo');
            $logo->storeAs('public/umkm', $logo->hashName());

            //delete old image
            Storage::delete('public/umkm/'.$umkms->logo);

            //update post with new image
            $umkms->update([
                'nama_umkm'     => $request->nama_umkm,
                'kategori_umkm'   => $request->kategori_umkm,
                'deskripsi'   => $request->deskripsi,
                'no_telp'   => $request->no_telp,
                'link_web'   => $request->link_web,
                'link_instagram'   => $request->link_instagram,
                'link_maps'   => $request->link_maps,
                'logo'     => $logo->hashName()
            ]);

        } else {

            //update post without image
            $umkms->update([
                'nama_umkm'     => $request->nama_umkm,
                'kategori_umkm'   => $request->kategori_umkm,
                'deskripsi'   => $request->deskripsi,
                'no_telp'   => $request->no_telp,
                'link_web'   => $request->link_web,
                'link_instagram'   => $request->link_instagram,
                'link_maps'   => $request->link_maps
                ]);
        }

        session()->flash('status','UMKM Berhasil Diubah!');

        //redirect to index
        return redirect()->route('umkm.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Umkm $umkm)
    {
        //delete image
        Storage::delete('public/umkm/'. $umkm->logo);

        //delete post
        $umkm->delete();
        
        session()->flash('status','UMKM Berhasil Dihapus');
        //redirect to index
        return redirect()->route('umkm.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    // public function destroy(Umkm $umkm)
    // {
    //     // Check if there are no users related to this UMKM
    //     $relatedUsersCount = DB::table('users')->where('nama_umkm', $umkm->id)->count();

    //     if ($relatedUsersCount > 0) {
    //         // Jika terdapat user terkait, tampilkan pesan kesalahan
    //         return redirect()->route('umkm.index')->with(['error' => 'Tidak dapat menghapus UMKM. Terdapat user terkait di dalam data User.']);
    //     }

    //     // Delete image
    //     Storage::delete('public/umkm/' . $umkm->logo);

    //     // Delete UMKM
    //     $umkm->delete();

    //     session()->flash('status', 'UMKM Berhasil Dihapus');

    //     // Redirect to index
    //     return redirect()->route('umkm.index')->with(['success' => 'Data Berhasil Dihapus!']);
    // }

    public function filterByCategory(Request $request)
    {
        // Ambil parameter kategori_umkm dari request
        $kategoriId = $request->input('kategori_umkm');

        // Ambil data UMKM berdasarkan kategori tertentu jika parameter kategori disertakan
        $umkmsQuery = Umkm::when($kategoriId, function ($query, $kategoriId) {
            return $query->whereHas('kategori', function ($subquery) use ($kategoriId) {
                $subquery->where('id', $kategoriId); // Sesuaikan kolom ID sesuai struktur tabel kategori
            });
        });

        // Menggunakan pagination untuk membatasi jumlah data yang diambil
        $umkms = $umkmsQuery->paginate(3); // Sesuaikan jumlah item per halaman sesuai kebutuhan

        // Ambil semua kategori
        $kategori = KategoriUmkm::all();

        // Render view dengan umkms dan kategori
        return view('frontend.umkms', compact('umkms', 'kategori'));
    }



}
