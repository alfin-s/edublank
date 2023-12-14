@extends('admin.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Data UMKM</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Data UMKM</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <a href="/umkm" class="btn btn-danger">Batal</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Form Edit Data UMKM
        </div>
            <div class="card-body">
                <form action="{{ route('umkm.update', $umkms->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nama_umkm">Nama UMKM</label>
                            <input class="form-control @error('nama_umkm') is-invalid @enderror" value="{{ old('nama_umkm', $umkms->nama_umkm) }}" type="text" placeholder="Masukkan Nama UMKM" name="nama_umkm">
                            <!-- error message untuk content -->
                            @error('nama_umkm')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="col-md-6">
                            <label for="kategori_umkm">Kategori UMKM</label>
                            <select class="form-control @error('kategori_umkm') is-invalid @enderror" value="{{ old('kategori_umkm', $umkms->kategori_umkm) }}" type="text" placeholder="Pilih Kategori UMKM" name="kategori_umkm">
                                @foreach ($kategori as $data )
                                    <option value="{{ $data->id }}">{{ $data->kategori_umkm }}</option>
                                @endforeach
                            </select>
                            <!-- error message untuk content -->
                            @error('kategori_umkm')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="no_telp">Nomor Telephone</label>
                            <input class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp', $umkms->no_telp) }}"  type="text" placeholder="Masukkan Nomor Telephone" name="no_telp">
                            <!-- error message untuk content -->
                            @error('no_telp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="col-md-4">
                            <label for="logo">Pilih Gambar</label>
                            <input class="form-control" type="file" name="logo">
                        </div>
                        <div class="col-md-2">
                            <label for="logo">Gambar</label>
                            <br>
                            <img src="{{ Storage::url('public/umkm/').$umkms->logo }}" class="rounded" style="width: 80px">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="link_web">Link Website</label>
                            <input class="form-control @error('link_web') is-invalid @enderror" value="{{ old('link_web', $umkms->link_web) }}" type="text" placeholder="Masukkan Link Website UMKM" name="link_web">
                            <!-- error message untuk title -->
                            @error('link_web')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="col-md-4">
                            <label for="link_instagram">Link Instagram</label>
                            <input class="form-control @error('link_instagram') is-invalid @enderror" value="{{ old('link_instagram', $umkms->link_instagram) }}" type="text" placeholder="Masukkan Link Instagram" name="link_instagram">
                            <!-- error message untuk title -->
                            @error('link_instagram')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="col-md-4">
                            <label for="link_maps">Link Google Maps</label>
                            <input class="form-control @error('link_maps') is-invalid @enderror" value="{{ old('link_maps', $umkms->link_maps) }}" type="text" placeholder="Masukkan Link Google Maps" name="link_maps">
                            <!-- error message untuk title -->
                            @error('link_maps')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="Masukkan Deskripsi">{{ old('deskripsi', $umkms->deskripsi) }}</textarea>
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