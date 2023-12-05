@extends('admin.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Kategori UMKM</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tebel Kategori UMKM</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('kategori-umkm.create') }}" class="btn btn-success">Tambah Kategori</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Kategori UMKM
        </div>
        <div class="card-body">
            @if ($message = Session::get('status'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>

                    @forelse ($kategori as $i => $data)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $data->kategori_umkm }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda ingin menghapus data ini ?');" action="{{ route('kategori-umkm.destroy', $data->id) }}" method="POST">
                                <a href="{{ route('kategori-umkm.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
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