@extends('admin.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Kategori Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tambah Kategori Produk</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <a href="/kategori-produk" class="btn btn-danger">Batal</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Form Tambah Kategori Produk
        </div>
            <div class="card-body">
                <form action="{{ route('kategori-produk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="kategori_produk">Kategori Produk</label>
                            <input class="form-control @error('kategori_produk') is-invalid @enderror" type="text" placeholder="Masukkan Kategori Produk" name="kategori_produk">
                            <!-- error message untuk content -->
                            @error('kategori_produk')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                </form>
            </div>
    </div>
</div>
@endsection