@extends('admin.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Users</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <a href="/users" class="btn btn-danger">Batal</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Form Edit Users
        </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="name">Nama</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{ old('name', $user->name) }}" name="name">
                            <!-- error message untuk content -->
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" value="{{ old('email', $user->email) }}" name="email">
                            <!-- error message untuk content -->
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="password">Password Baru</label>
                            <input class="form-control" type="text" placeholder="Masukkan Password baru.." name="password">
                            <!-- error message untuk content -->
                            <!--@error('password')-->
                            <!--    <div class="alert alert-danger mt-2">-->
                            <!--        {{ $message }}-->
                            <!--    </div>-->
                            <!--@enderror-->
                        </div>
                    </div>
                    <!--<div class="row mb-3">-->
                    <!--    <div class="col-md-4">-->
                    <!--        <label for="password">Password Baru</label>-->
                    <!--        <input class="form-control @error('password') is-invalid @enderror" type="text" placeholder="Masukkan Password baru.." name="password">-->
                            <!-- error message untuk content -->
                    <!--        @error('password')-->
                    <!--            <div class="alert alert-danger mt-2">-->
                    <!--                {{ $message }}-->
                    <!--            </div>-->
                    <!--        @enderror-->
                    <!--    </div>-->
                    <!--    <div class="col-md-4">-->
                    <!--        <label for="role">Pilih Role User</label>-->
                    <!--        <select class="form-control @error('role') is-invalid @enderror" type="text" placeholder="Pilih Role user" name="role">-->
                                
                    <!--                <option>admin</option>-->
                    <!--                <option>umkm</option>-->
                                
                    <!--        </select>-->
                    <!--         error message untuk content -->
                    <!--        @error('role')-->
                    <!--            <div class="alert alert-danger mt-2">-->
                    <!--                {{ $message }}-->
                    <!--            </div>-->
                    <!--        @enderror-->
                    <!--    </div>-->
                    <!--    <div class="col-md-4">-->
                    <!--        <label for="nama_umkm">Nama UMKM</label>-->
                    <!--        <select class="form-control @error('nama_umkm') is-invalid @enderror" type="text" pvalue="{{ old('password', $user->password) }}" name="nama_umkm">-->
                    <!--            @foreach ($umkms as $data )-->
                    <!--                <option value="{{ $data->id }}">{{ $data->nama_umkm }}</option>-->
                    <!--            @endforeach-->
                    <!--        </select>-->
                    <!--         error message untuk content -->
                    <!--        @error('nama_umkm')-->
                    <!--            <div class="alert alert-danger mt-2">-->
                    <!--                {{ $message }}-->
                    <!--            </div>-->
                    <!--        @enderror-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="row mb-3">
                        <!--<div class="col-md-6">-->
                        <!--    <a href="/users" type="submit" class="btn btn-danger btn-block">Batal</a>-->
                        <!--</div>-->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                        </div>
                    </div>
                    
                </form>
            </div>
    </div>
</div>
@endsection