<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form Buku</title>
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('admin.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Form Buku</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fas fa-book"></i> Perpustakaan SMPN 1 Lenangguar</a></li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Buku</h3>
                        </div>
                        <form role="form" method="POST" action="{{ route('buku_store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode_buku">Kode Buku</label>
                                    <input type="text" class="form-control" name="kode_buku" id="kode_buku" placeholder="Kode Buku">
                                </div>
                                <div class="form-group">
                                    <label for="no_udc">No UDC</label>
                                    <input type="text" class="form-control" name="no_udc" id="no_udc" placeholder="No UDC">
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul">
                                </div>
                                <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Penerbit">
                                </div>
                                <div class="form-group">
                                    <label for="pengarang">Pengarang</label>
                                    <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Pengarang">
                                </div>
                                <div class="form-group">
                                    <label for="tahun_terbit">Tahun Terbit</label>
                                    <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" placeholder="Tahun Terbit">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('dasboard_buku') }}" class="btn btn-default">Keluar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
