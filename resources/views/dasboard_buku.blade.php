<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
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
                            <h1>Data Buku</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Buku</li>
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
                                    <h3 class="card-title">Data Buku</h3>
                                    <div class="card-tools">
                                        <a href="{{ route('buku_tambah') }}" class="btn btn-primary">+ Tambah Buku Baru</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>Cari Data Buku :</p>
                                    <form action="/buku/cari" method="GET">
                                        <input type="text" name="cari" placeholder="Masukkan Nama Buku...." value="{{ old('cari') }}" class="form-control">
                                        <input type="submit" value="CARI" class="btn btn-success mt-2">
                                    </form>
                                    <table class="table table-bordered table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>Kode Buku</th> <!-- Added column -->
                                                <th>No UDC</th>
                                                <th>Judul</th>
                                                <th>Penerbit</th>
                                                <th>Pengarang</th>
                                                <th>Tahun Terbit</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($buku as $b)
                                            <tr>
                                                <td>{{ $b->Kode_Buku }}</td> <!-- Added column -->
                                                <td>{{ $b->No_UDC }}</td>
                                                <td>{{ $b->Judul }}</td>
                                                <td>{{ $b->Penerbit }}</td>
                                                <td>{{ $b->Pengarang }}</td>
                                                <td>{{ $b->Tahun_Terbit }}</td>
                                                <td>
                                                    <a href="/buku/edit{{ $b->Kode_Buku }}" class="btn btn-warning">Edit</a>
                                                    <a href="/buku/delete/{{ $b->Kode_Buku }}" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="mt-4">
                                        Halaman : {{ $buku->currentPage() }} <br/>
                                        Jumlah Data : {{ $buku->total() }} <br/>
                                        Data Per Halaman : {{ $buku->perPage() }} <br/>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <div>
                                            {{ $buku->links() }}
                                        </div>
                                        <div>
                                            <a href="{{ $buku->nextPageUrl() }}" class="btn btn-primary">Next</a>
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
