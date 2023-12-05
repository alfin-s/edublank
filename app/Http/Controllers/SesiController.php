<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view ('admin.login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib di isi',
            'password.required' => 'Password wajib di isi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {

            // return redirect('/dashboard');

            if(Auth::user()->role == 'admin'){
                return redirect('/dashboard');
            }elseif(Auth::user()->role == 'umkm'){
                return redirect('/dashboard/umkm');
            }

        }else{
            return redirect('login')->withErrors('Username atau password salah')->withInput();
        }

    }

    function logout(){
        Auth::logout();
        return redirect('login');
    }
}
