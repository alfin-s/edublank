<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UmkmsController extends Controller
{
    public function index(){
        return view ('admin/umkms.data-umkms');
    }
}
