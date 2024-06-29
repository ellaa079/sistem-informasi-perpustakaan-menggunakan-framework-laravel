<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NonsiswaController extends Controller
{
    public function dasboard_non_siswa()
    {
     // mengambil data dari table pegawai
     $non_siswa = DB::table('non_siswa')->paginate(10);
 
     // mengirim data pegawai ke view pegawai
     return view('dasboard_non_siswa', ['non_siswa' => $non_siswa] );
 
    }
     public function non_siswa_tambah(){
        return view('non_siswa');
     }


     public function store(Request $request)
     {
         // Validasi input
         $request->validate([
             'no_anggota' => 'required|integer|min:1',
             'nip' => 'required|integer|min:1',
             'nama_anggota' => 'required|string|max:255',
             'jabatan' => 'required|string|max:255',
             'ttl' => 'required|string|max:255',
             'alamat' => 'required|string|max:255',
             'kode_pos' => 'required|string|regex:/^\d{1,5}$/',
             'no_telp' => 'required|string|regex:/^\d{1,15}$/',
             'tgl_daftar' => 'required|date',
         ], [
             'no_anggota.required' => 'Nomor anggota wajib diisi.',
             'no_anggota.integer' => 'Nomor anggota harus berupa angka.',
             'nip.required' => 'NIP wajib diisi.',
             'nip.integer' => 'NIP harus berupa angka.',
             'nama_anggota.required' => 'Nama anggota wajib diisi.',
             'nama_anggota.string' => 'Nama anggota harus berupa teks.',
             'jabatan.required' => 'Jabatan wajib diisi.',
             'jabatan.string' => 'Jabatan harus berupa teks.',
             'ttl.required' => 'Tempat Tanggal Lahir wajib diisi.',
             'ttl.string' => 'Tempat Tanggal Lahir harus berupa teks.',
             'alamat.required' => 'Alamat wajib diisi.',
             'alamat.string' => 'Alamat harus berupa teks.',
             'kode_pos.required' => 'Kode pos wajib diisi.',
             'kode_pos.string' => 'Kode pos harus berupa teks.',
             'kode_pos.regex' => 'Kode pos harus terdiri dari 1 sampai 5 digit.',
             'no_telp.required' => 'Nomor telepon wajib diisi.',
             'no_telp.string' => 'Nomor telepon harus berupa teks.',
             'no_telp.regex' => 'Nomor telepon harus terdiri dari 1 sampai 15 digit.',
             'tgl_daftar.required' => 'Tanggal daftar wajib diisi.',
             'tgl_daftar.date' => 'Tanggal daftar harus berupa tanggal yang valid.',
         ]);
     
         // Menyimpan data ke database menggunakan Query Builder
         DB::table('non_siswa')->insert([
             'no_anggota' => $request->no_anggota,
             'nip' => $request->nip,
             'nama_anggota' => $request->nama_anggota,
             'jabatan' => $request->jabatan,
             'ttl' => $request->ttl,
             'alamat' => $request->alamat,
             'kode_pos' => $request->kode_pos,
             'no_telp' => $request->no_telp,
             'tgl_daftar' => $request->tgl_daftar,
         ]);
     
         // Alihkan halaman ke halaman lain dengan pesan sukses
         return redirect()->route('dasboard_non_siswa')->with('success', 'Data anggota berhasil ditambahkan.');
     }
     

    public function edit($Kode)
    {
    // mengambil data pegawai berdasarkan id yang dipilih
    $non_siswa = DB::table('non_siswa')->where('no_anggota',$Kode)->get();
    // passing data pegawai yang didapat ke view edit.blade.php
    return view('edit_non_siswa',['non_siswa' => $non_siswa]);
 
    }
    public function update(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'no_anggota' => 'required|integer|min:1',
             'nip' => 'required|integer|min:1',
             'nama_anggota' => 'required|string|max:255',
             'jabatan' => 'required|string|max:255',
             'ttl' => 'required|string|max:255',
             'alamat' => 'required|string|max:255',
             'kode_pos' => 'required|string|regex:/^\d{1,5}$/',
             'no_telp' => 'required|string|regex:/^\d{1,15}$/',
             'tgl_daftar' => 'required|date',
        ]);

        // Update data di database
        DB::table('non_siswa')->where('no_anggota', $request->no_anggota)->update([
             'no_anggota' => $request->no_anggota,
             'nip' => $request->nip,
             'nama_anggota' => $request->nama_anggota,
             'jabatan' => $request->jabatan,
             'ttl' => $request->ttl,
             'alamat' => $request->alamat,
             'kode_pos' => $request->kode_pos,
             'no_telp' => $request->no_telp,
             'tgl_daftar' => $request->tgl_daftar,
        ]);

        // Alihkan halaman ke halaman lain dengan pesan sukses
        return redirect()->route('dasboard_non_siswa')->with('success', 'Data  non siswa berhasil diupdate.');
    }
public function delete($Kode)
{
    $non_siswa = DB::table('non_siswa')->where('no_anggota', $Kode)->first();
    
    if (!$non_siswa) {
        return redirect('/dasboard_non_siswa')->with('error', 'Data tidak ditemukan.');
    }

    DB::table('non_siswa')->where('no_anggota', $Kode)->delete();

    return redirect('/dasboard_non_siswa')->with('success', 'Data berhasil dihapus.');
}
public function cari(Request $request)
    {
    // menangkap data pencarian
    $cari = $request->cari;
     
         // mengambil data dari table pegawai sesuai pencarian data
    $non_siswa = DB::table('non_siswa')
    ->where('Nama','like',"%".$cari."%")
    ->paginate();
     
         // mengirim data pegawai ke view index
    return view('dasboard_non_siswa',['non_siswa' => $non_siswa]);
     
    }
}
