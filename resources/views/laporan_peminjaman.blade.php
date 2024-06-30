<!DOCTYPE html>
<html>
<head>
    <title>Laporan Anggota Perpustakaan</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <style>
        .print-button {
            margin: 20px;
        }
        .report-table {
            margin: 0 auto;
            width: 80%;
            border-collapse: collapse;
        }
        .report-table, .report-table th, .report-table td {
            border: 1px solid black;
        }
        .report-table th, .report-table td {
            padding: 8px;
            text-align: center;
        }
        .header, .footer {
            margin: 20px 0;
        }
        .footer {
            margin-top: 40px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="print-button">
        <button onclick="window.print()" class="btn btn-primary">Cetak</button>
    </div>
    <div class="container">
        <div class="header text-center">
            <h5>PERPUSTAKAAN SMPN 1 LENANGGUAR</h5>
            <h6>Laporan Peminjaman Perpustakaan</h6>
            <p>Tanggal: <span>..................</span></p>
        </div>
        <table class="report-table">
            <thead>
                <tr>
                    <th>No Pinjam</th>
                    <th>Nama Peminjam</th>
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Kembali</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $pinjam)
                    <tr>
                        <td>{{ $pinjam->nomor_anggota }}</td>
                        <td>{{ $pinjam->nama_anggota }}</td>
                        <td>{{ $pinjam->kode_buku }}</td>
                        <td>{{ $pinjam->pengarang }}</td>
                        <td>{{ $pinjam->tgl_peminjaman }}</td>
                        <td>{{ $pinjam->tgl_pengembalian }}</td>
                        <td>{{ $pinjam->jumlah }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer">
            <p>Mengetahui,</p>
            <p>Kepala Perpustakaan</p>
            <br>
            <p>( Ema Nummala, S. Pd )</p>
        </div>
    </div>
    <!-- Include jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
