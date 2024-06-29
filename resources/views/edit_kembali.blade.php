<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengembalian Buku</title>
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
                        <h1>Edit Pengembalian Buku</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Kode Buku</th>
                                    <th>Nama Peminjam</th>
                                    <th>Judul Buku</th>
                                    <th>Jadwal Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($peminjaman as $p)
                                <tr>
                                    <td>{{ $p->kode_buku }}</td>
                                    <td>{{ $p->nama_anggota }}</td>
                                    <td>{{ $p->judul }}</td>
                                    <td>{{ $p->tgl_pengembalian }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        @foreach($peminjaman as $p)
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Pengembalian</h3>
                            </div>
                            <form action="{{ route('pengembalian_update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="nomor_anggota" value="{{ $p->nomor_anggota }}">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="diterima">Diterima Petugas</label>
                                        <input type="date" id="diterima" name="diterima" required="required" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="denda">Denda</label>
                                        <input type="number" id="denda" name="denda" class="form-control">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </form>
                        </div>
                        @endforeach
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
