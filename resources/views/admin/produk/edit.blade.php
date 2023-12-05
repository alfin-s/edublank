@extends('admin.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Data Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Data Produk</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <a href="/umkm" class="btn btn-danger">Batal</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Form Edit Data Produk
        </div>
            <div class="card-body">
                <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nama_produk">Nama Produk</label>
                            <input class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk', $produk->nama_produk) }}" type="text" name="nama_produk">
                            <!-- error message untuk content -->
                            @error('nama_produk')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="col-md-6">
                            <label for="nama_umkm">Nama UMKM</label>
                            <select class="form-control @error('nama_umkm') is-invalid @enderror" value="{{ old('nama_umkm', $produk->nama_umkm) }}" type="text" name="nama_umkm">
                                @foreach ($umkms as $data )
                                    <option value="{{ $data->id }}">{{ $data->nama_umkm }}</option>
                                @endforeach
                            </select>
                            <!-- error message untuk content -->
                            @error('nama_umkm')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="kategori_produk">Kategori Produk</label>
                            <select class="form-control @error('kategori_produk') is-invalid @enderror" value="{{ old('kategori_produk', $produk->kategori_produk) }}" type="text" name="kategori_produk">
                                @foreach ($kategori as $data )
                                    <option value="{{ $data->id }}">{{ $data->kategori_produk }}</option>
                                @endforeach
                            </select>
                            <!-- error message untuk content -->
                            @error('kategori_produk')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="col-md-3">
                            <label for="harga">Harga</label>
                            <input class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $produk->harga) }}"  type="text" name="harga">
                            <!-- error message untuk content -->
                            @error('harga')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="col-md-3">
                            <label for="gambar">Pilih Gambar</label>
                            <input class="form-control" type="file" name="gambar">
                        </div>
                        <div class="col-md-2">
                            <label for="logo">Gambar</label>
                            <br>
                            <img src="{{ Storage::url('public/produk/').$produk->gambar }}" class="rounded" style="width: 80px">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                            <!-- error message untuk content -->
                            @error('deskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">SIMPAN</button></div>
                    </div>
                </form>
            </div>
    </div>
</div>
@endsection