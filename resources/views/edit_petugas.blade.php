<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Petugas</title>
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
                        <h1>Edit Data Petugas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard_petugas">Kembali</a></li>
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
                        @foreach($petugas as $p)
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data Petugas</h3>
                            </div>
                            <form action="{{ route('petugas_update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $p->kode_petugas }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kode_petugas">Kode Petugas</label>
                                        <input type="text" id="kode_petugas" name="kode_petugas" required="required" value="{{ $p->kode_petugas }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Petugas</label>
                                        <input type="text" id="nama" name="nama" required="required" value="{{ $p->nama }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" id="jabatan" name="jabatan" required="required" value="{{ $p->jabatan }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" required="required" value="{{ $p->email }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                        <small class="text-muted">* Kosongkan jika tidak ingin mengubah password.</small>
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
