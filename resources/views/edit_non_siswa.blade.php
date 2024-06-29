<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Non Siswa</title>
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
                        <h1>Edit Data Non Siswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard_non_siswa">Kembali</a></li>
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
                        @foreach($non_siswa as $ns)
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data Non Siswa</h3>
                            </div>
                            <form action="{{ route('non_siswa_update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $ns->no_anggota }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="no_anggota">Nomor Anggota</label>
                                        <input type="text" id="no_anggota" name="no_anggota" required="required" value="{{ $ns->no_anggota }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="text" id="nip" name="nip" required="required" value="{{ $ns->nip }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_anggota">Nama Anggota</label>
                                        <input type="text" id="nama_anggota" name="nama_anggota" required="required" value="{{ $ns->nama_anggota }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" id="jabatan" name="jabatan" required="required" value="{{ $ns->jabatan }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="ttl">Tempat Tanggal Lahir</label>
                                        <input type="text" id="ttl" name="ttl" required="required" value="{{ $ns->ttl }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" id="alamat" name="alamat" required="required" value="{{ $ns->alamat }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="kode_pos">Kode Pos</label>
                                        <input type="text" id="kode_pos" name="kode_pos" required="required" value="{{ $ns->kode_pos }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telp">Nomor Telepon</label>
                                        <input type="text" id="no_telp" name="no_telp" required="required" value="{{ $ns->no_telp }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_daftar">Tanggal Daftar</label>
                                        <input type="date" id="tgl_daftar" name="tgl_daftar" required="required" value="{{ $ns->tgl_daftar }}" class="form-control">
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
