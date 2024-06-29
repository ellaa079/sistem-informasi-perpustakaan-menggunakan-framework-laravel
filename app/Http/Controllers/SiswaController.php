<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function dasboard_siswa()
    {
        $siswa = DB::table('siswa')->paginate(10);
        return view('dasboard_siswa', ['siswa'=>$siswa]);
    }

    public function siswa_tambah()
    {
        return view('siswa');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_siswa' => 'required|integer|min:1',
            'nis' => 'required|integer|min:1',
            'nama_siswa' => 'required|string|max:50',
            'jurusan' => 'required|string|max:20',
            'ttl' => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
            'no_telp' => 'required|string|max:15',
            'tgl_daftar' => 'required|date',
        ]);

        DB::table('siswa')->insert([
            'no_siswa' => $request->no_siswa,
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jurusan' => $request->jurusan,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'tgl_daftar' => $request->tgl_daftar,
        ]);
        

        return redirect()->route('dasboard_siswa')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit($Kode)
    {
    // mengambil data pegawai berdasarkan id yang dipilih
    $siswa = DB::table('siswa')->where('no_siswa',$Kode)->get();
    // passing data pegawai yang didapat ke view edit.blade.php
    return view('edit_siswa',['siswa' => $siswa]);
 
    }

    public function update(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'no_siswa' => 'required|integer|min:1',
            'nis' => 'required|integer|min:1',
            'nama_siswa' => 'required|string|max:50',
            'jurusan' => 'required|string|max:20',
            'ttl' => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
            'no_telp' => 'required|string|max:15',
            'tgl_daftar' => 'required|date',
    ]);

    // update data buku
    DB::table('siswa')->where('no_siswa', $request->no_siswa)->update([
        'no_siswa' => $request->no_siswa,
        'nis' => $request->nis,
        'nama_siswa' => $request->nama_siswa,
        'jurusan' => $request->jurusan,
        'ttl' => $request->ttl,
        'alamat' => $request->alamat,
        'no_telp' => $request->no_telp,
        'tgl_daftar' => $request->tgl_daftar,
    ]);
    // alihkan halaman ke halaman buku
    return redirect('/dasboard_siswa');
}



    public function delete($kode)
    {
        $siswa = DB::table('siswa')->where('no_siswa', $kode)->first();
    
        if (!$siswa) {
            return redirect()->route('dasboard_siswa')->with('error', 'Data tidak ditemukan.');
        }
    
        DB::table('siswa')->where('no_siswa', $kode)->delete();
        return redirect()->route('dasboard_siswa')->with('success', 'Data siswa berhasil dihapus.');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $siswa = DB::table('siswa')->where('nama_siswa', 'like', "%" . $cari . "%")->paginate(10);
        return view('dasboard_siswa', compact('siswa'));
    }
}
