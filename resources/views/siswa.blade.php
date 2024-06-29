<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form Siswa</title>
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('admin.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Form Siswa</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fas fa-book"></i> Perpustakaan SMKN 1 Sumbawa Besar</a></li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Siswa</h3>
                        </div>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form role="form" method="POST" action="{{ route('siswa_store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="no_siswa">No Siswa</label>
                                    <input type="text" class="form-control" name="no_siswa" id="no_siswa" placeholder="No Siswa" value="{{ old('no_siswa') }}">
                                </div>
                                <div class="form-group">
                                    <label for="nis">NIS</label>
                                    <input type="text" class="form-control" name="nis" id="nis" placeholder="NIS" value="{{ old('nis') }}">
                                </div>
                                <div class="form-group">
                                    <label for="nama_siswa">Nama Siswa</label>
                                    <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Nama Siswa" value="{{ old('nama_siswa') }}">
                                </div>
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan" value="{{ old('jurusan') }}">
                                </div>
                                <div class="form-group">
                                    <label for="ttl">TTL</label>
                                    <input type="text" class="form-control" name="ttl" id="ttl" placeholder="TTL" value="{{ old('ttl') }}">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="{{ old('alamat') }}">
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No Telp</label>
                                    <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="{{ old('no_telp') }}">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_daftar">Tanggal Daftar</label>
                                    <input type="date" class="form-control" name="tgl_daftar" id="tgl_daftar" placeholder="Tanggal Daftar" value="{{ old('tgl_daftar') }}">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('dasboard_siswa') }}" class="btn btn-default">Keluar</a>
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
