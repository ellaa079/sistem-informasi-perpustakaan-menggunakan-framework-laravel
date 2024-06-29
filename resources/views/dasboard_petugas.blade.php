<!DOCTYPE html>
<html>
<head>
    <title>Data Petugas</title>
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.sidebar')

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Petugas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Petugas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Petugas</h3>
                                    <div class="card-tools">
                                        <a href="{{ route('petugas_tambah') }}" class="btn btn-primary">+ Tambah Petugas Baru</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>Cari Data Petugas:</p>
                                    <form action="/petugas/cari" method="GET">
                                        <input type="text" name="cari" placeholder="Masukkan Nama Petugas...." value="{{ old('cari') }}" class="form-control">
                                        <input type="submit" value="CARI" class="btn btn-success mt-2">
                                    </form>
                                    <table class="table table-bordered table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>Kode Petugas</th>
                                                <th>Nama Petugas</th>
                                                <th>Jabatan</th>
                                                <th>Email</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($petugas as $p)
                                            <tr>
                                                <td>{{ $p->kode_petugas }}</td>
                                                <td>{{ $p->nama }}</td>
                                                <td>{{ $p->jabatan }}</td>
                                                <td>{{ $p->email}}</td>
                                                <td>
                                                    <a href="/petugas/edit{{ $p->kode_petugas }}" class="btn btn-warning">Edit</a>
                                                    <a href="/petugas/delete/{{ $p->kode_petugas }}" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
