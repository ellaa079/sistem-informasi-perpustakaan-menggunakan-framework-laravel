<!DOCTYPE html>
<html>
<head>
    <title>Peminjaman Buku</title>
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
                            <h1>Peminjaman Buku</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Peminjaman Buku</li>
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
                                    <h3 class="card-title">Data Peminjaman Buku</h3>
                                    <div class="card-tools">
                                        <a href="{{ route('peminjaman_tambah') }}" class="btn btn-primary">+ Tambah Peminjaman Baru</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>Cari Data Peminjaman :</p>
                                    <form action="/peminjaman/cari" method="GET">
                                        <input type="text" name="cari" placeholder="Masukkan Nama Peminjam atau Judul Buku...." value="{{ old('cari') }}" class="form-control">
                                        <input type="submit" value="CARI" class="btn btn-success mt-2">
                                    </form>
                                    <table class="table table-bordered table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>Kode Buku</th>
                                                <th>Nama Peminjam</th>
                                                <th>Judul Buku</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Kembali</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($peminjaman as $p)
                                            <tr>
                                                <td>{{ $p->kode_buku }}</td>
                                                <td>{{ $p->nama_anggota }}</td>
                                                <td>{{ $p->judul }}</td>
                                                <td>{{ $p->tgl_peminjaman }}</td>
                                                <td>{{ $p->tgl_pengembalian }}</td>
                                                
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="mt-4">
                                        Halaman : {{ $peminjaman->currentPage() }} <br/>
                                        Jumlah Data : {{ $peminjaman->total() }} <br/>
                                        Data Per Halaman : {{ $peminjaman->perPage() }} <br/>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <div>
                                            {{ $peminjaman->links() }}
                                        </div>
                                        <div>
                                            <a href="{{ $peminjaman->nextPageUrl() }}" class="btn btn-primary">Next</a>
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
