<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class PetugasController extends Controller
{   
    public function dasboard_petugas(){
        $petugas = DB::table('petugas')->get();
        return view('dasboard_petugas', ['petugas'=>$petugas]);
    }


    public function petugas_tambah(){
        return view('petugas');
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'kode_petugas' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required|string|min:8',
    ]);

    // Menyimpan data ke database menggunakan Query Builder
    DB::table('petugas')->insert([
        'kode_petugas' => $request->kode_petugas,
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    // Alihkan halaman ke halaman lain dengan pesan sukses
    return redirect()->route('dasboard_petugas')->with('success', 'Petugas berhasil ditambahkan.');
}


    public function edit($Kode)
    {
    // mengambil data pegawai berdasarkan id yang dipilih
    $petugas = DB::table('petugas')->where('kode_petugas',$Kode)->get();
    // passing data pegawai yang didapat ke view edit.blade.php
    return view('edit_petugas',['petugas' => $petugas]);
 
    }

    

    public function update(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'kode_petugas' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required|string|min:8',
    ]);

    // update data buku
    DB::table('petugas')->where('kode_petugas', $request->kode_petugas)->update([
        'kode_petugas' => $request->kode_petugas,
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);
    // alihkan halaman ke halaman buku
    return redirect('/dasboard_petugas');
}



    public function delete($kode)
    {
        $petugas = DB::table('petugas')->where('kode_petugas', $kode)->first();
    
        if (!$petugas) {
            return redirect()->route('dasboard_petugas')->with('error', 'Data tidak ditemukan.');
        }
    
        DB::table('petugas')->where('no_petugas', $kode)->delete();
        return redirect()->route('dasboard_petugas')->with('success', 'Data  berhasil dihapus.');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $petugas = DB::table('petugas')->where('nama_petugas', 'like', "%" . $cari . "%")->paginate(10);
        return view('dasboard_petugas', compact('petugas'));
    }

    
}
