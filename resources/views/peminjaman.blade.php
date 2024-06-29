<!DOCTYPE html>
<html>
<head>
    <title>Form Peminjaman</title>
    <!-- Include AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.sidebar')

        <div class="content-wrapper">
            <div class="container-fluid pt-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Peminjaman</h3>
                    </div>
                    <form action="{{ route('peminjaman_store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nomor_anggota" class="col-sm-2 col-form-label">Nomor Anggota:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="nomor_anggota" name="nomor_anggota" value="{{ old('nomor_anggota') }}">
                                    @error('nomor_anggota')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <label for="tgl_peminjaman" class="col-sm-2 col-form-label">Tanggal Peminjaman:</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" value="{{ old('tgl_peminjaman') }}">
                                    @error('tgl_peminjaman')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_anggota" class="col-sm-2 col-form-label">Nama Anggota:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="{{ old('nama_anggota') }}">
                                    @error('nama_anggota')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <label for="tgl_pengembalian" class="col-sm-2 col-form-label">Tanggal Pengembalian:</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" value="{{ old('tgl_pengembalian') }}">
                                    @error('tgl_pengembalian')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="buku-table">
                                    <thead>
                                        <tr>
                                            <th>Kode Buku</th>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>Jumlah</th>
                                            <th><button type="button" class="btn btn-success" id="add-row">Tambah</button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (old('kode_buku', ['']) as $index => $oldKodeBuku)
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="kode_buku[]" value="{{ old('kode_buku.'. $index) }}">
                                                @error('kode_buku.'. $index)
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="judul[]" value="{{ old('judul.'. $index) }}">
                                                @error('judul.'. $index)
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="pengarang[]" value="{{ old('pengarang.'. $index) }}">
                                                @error('pengarang.'. $index)
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="penerbit[]" value="{{ old('penerbit.'. $index) }}">
                                                @error('penerbit.'. $index)
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="jumlah[]" value="{{ old('jumlah.'. $index) }}">
                                                @error('jumlah.'. $index)
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td><button type="button" class="btn btn-danger delete-row">Hapus</button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger mt-2">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary">Keluar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Include jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include AdminLTE JS -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    <script>
        $(document).ready(function() {
            // Tambah row baru saat tombol tambah diklik
            $('#add-row').click(function() {
                var newRow = `
                    <tr>
                        <td><input type="text" class="form-control" name="kode_buku[]"></td>
                        <td><input type="text" class="form-control" name="judul[]"></td>
                        <td><input type="text" class="form-control" name="pengarang[]"></td>
                        <td><input type="text" class="form-control" name="penerbit[]"></td>
                        <td><input type="text" class="form-control" name="jumlah[]"></td>
                        <td><button type="button" class="btn btn-danger delete-row">Hapus</button></td>
                    </tr>
                `;
                $('#buku-table tbody').append(newRow);
            });

            // Hapus row saat tombol hapus diklik
            $(document).on('click', '.delete-row', function() {
                $(this).closest('tr').remove();
            });
        });
    </script>
</body>
</html>
