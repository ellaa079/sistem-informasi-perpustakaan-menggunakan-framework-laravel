<!-- resources/views/siswa/form.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Anggota Non_Siswa</title>
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('admin.sidebar')

    <div class="content-wrapper">
        <div class="landscape-form">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <h1>Form Anggota Non_Siswa</h1>
                            <h2>Perpustakaan SMKN 1 Sumbawa Besar</h2>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card">
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
                                    <form action="{{ route('non_siswa_store') }}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="no_anggota" class="col-sm-4 col-form-label">No. Anggota</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="no_anggota" name="no_anggota" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nim" class="col-sm-4 col-form-label">NIP</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="nip" name="nip" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="namaLengkap" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="nama_anggota" name="nama_anggota" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="jabatan" name="jabatan" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ttl" class="col-sm-4 col-form-label">Tempat Tanggal Lahir</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="ttl" name="ttl" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="alamat" name="alamat" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kodePos" class="col-sm-4 col-form-label">Kode Pos</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="kode_pos" name="kode_pos" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="noTelp" class="col-sm-4 col-form-label">No. Telp</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="no_telp" name="no_telp" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="tglDaftar" class="col-sm-4 col-form-label">Tgl Daftar</label>
                                            <div class="col-sm-8">
                                                <input type="date" id="tgl_daftar" name="tgl_daftar" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                               
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <button href="/dasboard_non_siswa"  type="button" class="btn btn-secondary">Keluar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
