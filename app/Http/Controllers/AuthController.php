<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Cari petugas berdasarkan email
        $petugas = Petugas::where('email', $credentials['email'])->first();

        if ($petugas) {
            // Verifikasi password
            if (Hash::check($credentials['password'], $petugas->password)) {
                // Login berhasil
                Auth::login($petugas);
                return redirect()->intended('/admin'); // Ganti 'dashboard' dengan rute Anda sendiri
            } else {
                // Password salah
                return back()->withErrors(['password' => 'Password salah.']);
            }
        } else {
            // Petugas tidak ditemukan
            return back()->withErrors(['email' => 'Email tidak ditemukan.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
