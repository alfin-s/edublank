@extends('admin.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data UMKM</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tebel Data UMKM</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('umkm.create') }}" class="btn btn-success">Tambah UMKM</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data UMKM
        </div>
        <div class="card-body">
            @if ($message = Session::get('status'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($error = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $error }}</strong>
                </div>
            @endif
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama UMKM</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Logo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama UMKM</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Logo</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>

                    @forelse ($umkms as $data)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $data->nama_umkm }}</td>
                        <td>{{ $data->deskripsi }}</td>
                        <td>{{ $data->kategori['kategori_umkm'] }}</td>
                        <td>
                            <img src="{{ asset('storage/umkm/'.$data->logo) }}" class="rounded" style="width: 80px">
                        </td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda ingin menghapus data ini ?');" action="{{ route('umkm.destroy', $data->id) }}" method="POST">
                                <a href="{{ route('umkm.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <div class="alert alert-danger">
                            Data UMKM belum Tersedia.
                        </div>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection