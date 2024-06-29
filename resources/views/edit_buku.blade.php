<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Buku</title>
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
                        <h1>Edit Data Buku</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dasboard_buku">Kembali</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @foreach($buku as $b)
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data Buku</h3>
                            </div>
                            <form action="{{ route('buku_update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $b->Kode_Buku }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Kode_Buku">Kode Buku</label>
                                        <input type="text" id="Kode_Buku" name="Kode_Buku" required="required" value="{{ $b->Kode_Buku }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="No_UDC">No UDC</label>
                                        <input type="text" id="No_UDC" name="No_UDC" required="required" value="{{ $b->No_UDC }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Judul">Judul</label>
                                        <input type="text" id="Judul" name="Judul" required="required" value="{{ $b->Judul }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Penerbit">Penerbit</label>
                                        <input type="text" id="Penerbit" name="Penerbit" required="required" value="{{ $b->Penerbit }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Pengarang">Pengarang</label>
                                        <input type="text" id="Pengarang" name="Pengarang" required="required" value="{{ $b->Pengarang }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Tahun_Terbit">Tahun Terbit</label>
                                        <input type="text" id="Tahun_Terbit" name="Tahun_Terbit" required="required" value="{{ $b->Tahun_Terbit }}" class="form-control">
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
