@extends('admin.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Akun Saya</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Akun Saya</li>
    </ol>
    <div class="card mb-4">
        {{-- <div class="card-body">
            <button class="btn btn-success">Tambah UMKM</button>
        </div> --}}
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Foto</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">E-mail</th>
                <th scope="col">Password</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                    <img src="https://cdn.kibrispdr.org/data/754/logo-keraton-jogja-vector-39.jpg"
                    width="50px" class="rounded-circle" alt="">
                </td>
                <td>Fino</td>
                <td>fino-hebat</td>
                <td>fino@hebat.com</td>
                <td>******</td>
                <td>
                    <a href="#" class="btn btn-success"><i class="fas fa-edit"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection