<?php

use App\Http\Controllers\SesiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UmkmDetailController;
use Illuminate\Support\Facades\Route;


// Route::get('/umkm-detail', function () {
//     return view('frontend.umkm-detail');
// });


// Route::get('/{kategori}', [FrontendController::class, 'index']);

Route::get('/', [FrontendController::class, 'index']);
Route::get('/umkms', [FrontendController::class, 'umkms']);

Route::get('/umkm-detail/{id}', [UmkmDetailController::class, 'show'])->name('umkm-detail');

Route::get('/produk-detail/{id}', [ProdukDetailController::class, 'showProduk'])->name('produk-detail');



// Route::get('/umkms/filter', [UmkmController::class, 'filterByCategory'])->name('umkm.filterByCategory');
// Route::get('/{id}', [FrontendController::class, 'show'])->name('produk.show');

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});

Route::get('/home', function(){
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/logout', [SesiController::class, 'logout']);
    
    //ADMIN
    Route::resource('/users', \App\Http\Controllers\UsersController::class)->middleware('userAkses:admin');

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('userAkses:admin');

    Route::resource('/umkm', \App\Http\Controllers\UmkmController::class)->middleware('userAkses:admin');
    Route::resource('/kategori-umkm', \App\Http\Controllers\KategoriUmkmController::class)->middleware('userAkses:admin');

    Route::resource('/produk', \App\Http\Controllers\ProdukController::class)->middleware('userAkses:admin');
    Route::resource('/kategori-produk', \App\Http\Controllers\KategoriProdukController::class)->middleware('userAkses:admin');

    //UMKMS
    Route::get('/dashboard/umkm', [DashboardController::class, 'umkm'])->middleware('userAkses:umkm');
    // Route::resource('/umkm/produk', \App\Http\Controllers\UmkmsController::class)->middleware('userAkses:umkm');
});


