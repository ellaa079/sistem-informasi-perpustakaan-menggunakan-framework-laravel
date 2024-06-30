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
            <h6>Laporan Anggota Perpustakaan</h6>
            <p>Tanggal: <span>{{ now()->format('d-m-Y') }}</span></p>
        </div>
        <table class="report-table">
            <thead>
                <tr>
                    <th>No Anggota</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Jabatan</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->no_anggota }}</td>
                        <td>{{ $member->nama_anggota }}</td>
                        <td>{{ $member->nip }}</td>
                        <td>{{ $member->jabatan }}</td>
                        <td>{{ $member->alamat }}</td>
                        <td>{{ $member->no_telp }}</td>
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
