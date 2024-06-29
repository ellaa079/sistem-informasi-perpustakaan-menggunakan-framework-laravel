<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PepustakaanController extends Controller
{
    //buku
    public function dasboard_buku()
    {
     // mengambil data dari table pegawai
     $buku = DB::table('buku')->paginate(10);
 
     // mengirim data pegawai ke view pegawai
     return view('dasboard_buku', ['buku' => $buku] );
 
    }
     public function buku_tambah(){
        return view('buku');
     }

     public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kode_buku' => 'required|string|max:255',
            'no_udc' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1000|max:' . date('Y'),
        ]);

        // Menyimpan data buku ke dalam database menggunakan Query Builder
        DB::table('buku')->insert([
            'kode_buku' => $request->kode_buku,
            'no_udc' => $request->no_udc,
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        // Alihkan halaman kembali ke halaman dashboard buku
        return redirect()->route('dasboard_buku')->with('success', 'Buku berhasil ditambahkan.');
    }
    public function edit($Kode)
    {
    // mengambil data pegawai berdasarkan id yang dipilih
    $buku = DB::table('buku')->where('Kode_Buku',$Kode)->get();
    // passing data pegawai yang didapat ke view edit.blade.php
    return view('edit_buku',['buku' => $buku]);
 
    }
    public function update(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'Kode_Buku' => 'required|string|max:255',
        'No_UDC' => 'required|string|max:255',
        'Judul' => 'required|string|max:255',
        'Penerbit' => 'required|string|max:255',
        'Pengarang' => 'required|string|max:255',
        'Tahun_Terbit' => 'required|string|max:255',
    ]);

    // update data buku
    DB::table('buku')->where('Kode_Buku', $request->Kode_Buku)->update([
        'No_UDC' => $request->No_UDC,
        'Judul' => $request->Judul,
        'Penerbit' => $request->Penerbit,
        'Pengarang' => $request->Pengarang,
        'Tahun_Terbit' => $request->Tahun_Terbit,
    ]);
    // alihkan halaman ke halaman buku
    return redirect('/dasboard_buku');
}
public function delete($Kode)
{
    $buku = DB::table('buku')->where('Kode_Buku', $Kode)->first();
    
    if (!$buku) {
        return redirect('/dasboard_buku')->with('error', 'Buku tidak ditemukan.');
    }

    DB::table('buku')->where('Kode_Buku', $Kode)->delete();

    return redirect('/dasboard_buku')->with('success', 'Buku berhasil dihapus.');
}
public function cari(Request $request)
    {
    // menangkap data pencarian
    $cari = $request->cari;
     
         // mengambil data dari table pegawai sesuai pencarian data
    $buku = DB::table('buku')
    ->where('Judul','like',"%".$cari."%")
    ->paginate();
     
         // mengirim data pegawai ke view index
    return view('dasboard_buku',['buku' => $buku]);
     
    }

    

    

    

   

   
}
