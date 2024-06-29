<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
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
                            <h1>Data Siswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Siswa</li>
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
                                    <h3 class="card-title">Data Siswa</h3>
                                    <div class="card-tools">
                                        <a href="{{ route('siswa_tambah') }}" class="btn btn-primary">+ Tambah Siswa Baru</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>Cari Data Siswa :</p>
                                    <form action="/buku/cari" method="GET">
                                        <input type="text" name="cari" placeholder="Masukkan Nama Siswa...." value="{{ old('cari') }}" class="form-control">
                                        <input type="submit" value="CARI" class="btn btn-success mt-2">
                                    </form>
                                    <table class="table table-bordered table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>No Siswa</th> <!-- Added column -->
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Tempat Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>No Telp</th>
                                                <th>Tanggal Daftar</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($siswa as $s)
                                            <tr>
                                                <td>{{ $s->no_siswa }}</td> <!-- Added column -->
                                                <td>{{ $s->nis }}</td>
                                                <td>{{ $s->nama_siswa }}</td>
                                                <td>{{ $s->ttl }}</td>
                                                <td>{{ $s->alamat }}</td>
                                                <td>{{ $s->no_telp }}</td>
                                                <td>{{ $s->tgl_daftar}}</td>
                                                <td>
                                                    <a href="/siswa/edit{{ $s->no_siswa }}" class="btn btn-warning">Edit</a>
                                                    <a href="/siswa/delete/{{ $s->no_siswa }}" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="mt-4">
                                        Halaman : {{ $siswa->currentPage() }} <br/>
                                        Jumlah Data : {{ $siswa->total() }} <br/>
                                        Data Per Halaman : {{ $siswa->perPage() }} <br/>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <div>
                                            {{ $siswa->links() }}
                                        </div>
                                        <div>
                                            <a href="{{ $siswa->nextPageUrl() }}" class="btn btn-primary">Next</a>
                                        </div>
                                    </div>
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
