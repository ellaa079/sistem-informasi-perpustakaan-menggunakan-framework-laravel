<!DOCTYPE html>
<html>
<head>
    <title>Data  Non Siswa</title>
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
                            <h1>Data Non Siswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Non Siswa</li>
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
                                    <h3 class="card-title">Data Non Siswa</h3>
                                    <div class="card-tools">
                                        <a href="{{ route('non_siswa_tambah') }}" class="btn btn-primary">+ Tambah Siswa Baru</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>Cari Data Siswa :</p>
                                    <form action="/non_siswa/cari" method="GET">
                                        <input type="text" name="cari" placeholder="Masukkan Nama anggota...." value="{{ old('cari') }}" class="form-control">
                                        <input type="submit" value="CARI" class="btn btn-success mt-2">
                                    </form>
                                    <table class="table table-bordered table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>No Anggota</th> <!-- Added column -->
                                                <th>NIP</th>
                                                <th>Nama </th>
                                                <th>Jabatan</th>
                                                <th>Tempat Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>No Telp</th>
                                                <th>Tanggal Daftar</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($non_siswa as $ns)
                                            <tr>
                                                <td>{{ $ns->no_anggota }}</td> <!-- Added column -->
                                                <td>{{ $ns->nip }}</td>
                                                <td>{{ $ns->nama_anggota }}</td>
                                                <td>{{ $ns->jabatan }}</td>
                                                <td>{{ $ns->ttl }}</td>
                                                <td>{{ $ns->alamat }}</td>
                                                <td>{{ $ns->no_telp }}</td>
                                                <td>{{ $ns->tgl_daftar}}</td>
                                                <td>
                                                    <a href="/non_siswa/edit{{ $ns->no_anggota }}" class="btn btn-warning">Edit</a>
                                                    <a href="/non_siswa/delete/{{ $ns->no_anggota }}" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="mt-4">
                                        Halaman : {{ $non_siswa->currentPage() }} <br/>
                                        Jumlah Data : {{ $non_siswa->total() }} <br/>
                                        Data Per Halaman : {{ $non_siswa->perPage() }} <br/>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <div>
                                            {{ $non_siswa->links() }}
                                        </div>
                                        <div>
                                            <a href="{{ $non_siswa->nextPageUrl() }}" class="btn btn-primary">Next</a>
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
