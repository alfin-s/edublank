@extends('admin.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            @if (Auth::user()->role == 'admin')
                <div class="col-xl-3 col-md-6">
                    <div class="card-counter primary">
                        <i class="fas fa-store"></i>
                        <span class="count-numbers">{{$umkm}}</span>
                        <span class="count-name">Data UMKM</span>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card-counter danger">
                        <i class="fas fa-th-list"></i>
                        <span class="count-numbers">{{$kategoriUmkm}}</span>
                        <span class="count-name">Kategori UMKM</span>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card-counter success">
                        <i class="fas fa-shopping-bag"></i>
                        <span class="count-numbers">{{$produk}}</span>
                        <span class="count-name">Data Produk</span>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card-counter info">
                        <i class="fas fa-receipt"></i>
                        <span class="count-numbers">{{$kategoriProduk}}</span>
                        <span class="count-name">Kategori Produk</span>
                    </div>
                </div>
            @endif
            @if (Auth::user()->role == 'umkm')
                <div class="col-md-6">
                    <div class="card-counter primary">
                        <i class="fas fa-store"></i>
                        <span class="count-numbers">{{$produk}}</span>
                        <span class="count-name">Data Produk</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-counter success">
                        <i class="fas fa-shopping-bag"></i>
                        <span class="count-numbers">{{$kategoriProduk}}</span>
                        <span class="count-name">Kategori Produk</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection