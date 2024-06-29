<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Siswa</title>
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
                        <h1>Edit Data Siswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard_siswa">Kembali</a></li>
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
                        @foreach($siswa as $s)
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data Siswa</h3>
                            </div>
                            <form action="{{ route('siswa_update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $s->no_siswa }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="no_siswa">Nomor Siswa</label>
                                        <input type="text" id="no_siswa" name="no_siswa" required="required" value="{{ $s->no_siswa }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="nis">NIS</label>
                                        <input type="text" id="nis" name="nis" required="required" value="{{ $s->nis }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_siswa">Nama Lengkap</label>
                                        <input type="text" id="nama_siswa" name="nama_siswa" required="required" value="{{ $s->nama_siswa }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="jurusan">Jurusan</label>
                                        <input type="text" id="jurusan" name="jurusan" required="required" value="{{ $s->jurusan }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="ttl">Tempat Tanggal Lahir</label>
                                        <input type="text" id="ttl" name="ttl" required="required" value="{{ $s->ttl }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" id="alamat" name="alamat" required="required" value="{{ $s->alamat }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telp">Nomor Hp</label>
                                        <input type="text" id="no_telp" name="no_telp" required="required" value="{{ $s->no_telp }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_daftar">Tanggal Daftar</label>
                                        <input type="text" id="tgl_daftar" name="tgl_daftar" required="required" value="{{ $s->tgl_daftar }}" class="form-control">
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
