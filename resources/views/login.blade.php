<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        /* CSS tambahan */
        body {
            font-family: Arial, sans-serif;
            font-size: 18px; /* Ukuran font umum */
            background-image: url('{{ asset("image/smplg.jfif") }}'); /* Ganti dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .login-box {
            background-color: rgba(255, 255, 255, 0.9); /* Tambahkan transparansi untuk kotak login */
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px; /* Lebar maksimum kotak login */
            width: 100%;
        }

        .logo {
            margin-bottom: 30px;
        }

        .logo-image {
            width: 120px; /* Lebar gambar logo */
            height: 120px; /* Tinggi gambar logo */
        }

        h2 {
            margin-bottom: 30px;
            font-size: 28px; /* Ukuran font judul */
            color: #333;
        }

        .textbox {
            margin-bottom: 20px;
            position: relative;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 15px;
            font-size: 16px; /* Ukuran font input */
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 15px;
            font-size: 18px; /* Ukuran font tombol */
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            outline: none;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 16px; /* Ukuran font pesan kesalahan */
            text-align: left; /* Teks pesan kesalahan kiri */
        }

        ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        ul li {
            margin-bottom: 10px;
            font-size: 16px; /* Ukuran font daftar pesan kesalahan */
            text-align: left; /* Teks pesan kesalahan kiri */
        }

        ul li::before {
            content: "•";
            color: #721c24;
            display: inline-block;
            margin-right: 5px;
            font-size: 1.5em;
            vertical-align: middle;
        }

        ul li:last-child::before {
            content: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="logo">
                <img src="{{ asset('image/default_logo_sekolah_pintar.png') }}" alt="Logo" class="logo-image">
            </div>
            <h2>Perpustakaan 
                SMPN 1 Lenangguar</h2>
            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('login') }}" method="POST">
                @csrf
                <div class="textbox">
                    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>
                <div class="textbox">
                    <input type="password" name="password" placeholder="Kata Sandi" required>
                </div>
                <button type="submit" class="btn">Masuk</button>
            </form>
        </div>
    </div>
</body>
</html>
