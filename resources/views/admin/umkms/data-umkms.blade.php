@extends('admin.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tebel Data Produk</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('produk.create') }}" class="btn btn-success">Tambah Produk</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Produk
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Nama UMKM</th>
                        <th>Kategori Produk</th>
                        <th>Deskripsi</th>
                        <th>Foto Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama UMKM</th>
                        <th>Kategori Produk</th>
                        <th>Deskripsi</th>
                        <th>Foto Produk</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>

                    {{-- @forelse ($produks as $data)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $data->nama_produk }}</td>
                        <td>{{ $data->umkm['nama_umkm'] }}</td>
                        <td>{{ $data->kategori['kategori_produk'] }}</td> --}}
                        {{-- <td>{{ $data->harga }}</td> --}}
                        {{-- <td>{{ $data->deskripsi }}</td>
                        <td>
                            <img src="{{ Storage::url('public/produk/').$data->gambar }}" class="rounded" style="width: 80px">
                        </td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda ingin menghapus data ini ?');" action="{{ route('produk.destroy', $data->id) }}" method="POST">
                                <a href="{{ route('produk.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
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
                    @endforelse --}}

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection