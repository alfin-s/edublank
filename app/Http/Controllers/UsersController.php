<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Umkm;

use App\Models\KategoriUmkm;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        //get umkm
        $users = User::latest()->get();
        //render view with umkm
        return view('admin/users.data-users', compact('users'));
    }

    public function create()
    {
        $users = User::all();
        $umkms = Umkm::all();

        return view('admin/users.tambah', compact('users', 'umkms'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            
            'name'     => 'required',
            'email'     => 'required',
            'password'     => 'required',
            'role'     => 'required',
            'nama_umkm'     => 'required',

        ]);

        //create post
        User::create([
            'name'     => $request->name,
            'email'     => $request->email,
            'password' => bcrypt($request->password),
            'role'     => $request->role,
            'nama_umkm'   => $request->nama_umkm,
        ]);

        session()->flash('status','User Baru Berhasil Tambahkan!');

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function  edit(Request $request, $id){

        $user = User::findOrFail($id);
        $umkms = Umkm::all();
        // dd ($produk);
        return view ('admin/users.edit', compact('user','umkms'));
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);

        //validate form
        $this->validate($request, [
            
            'name'   => 'required',
            'email'   => 'required',
            'password'     => 'required',
            'role'     => 'required',
            'nama_umkm'     => 'required',

        ]);

            //update post without image
            $user->update([
                'name'   => $request->name,
                'email'   => $request->email,
                'password'   => bcrypt($request->password),
                'naroleme'   => $request->role,
                'nama_umkm'   => $request->nama_umkm,
                ]);

        session()->flash('status','Data User Berhasil Diubah!');
        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy(User $user)
    {
        //delete post
        $user->delete();

        session()->flash('status','Data User Berhasil Dihapus');
        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
