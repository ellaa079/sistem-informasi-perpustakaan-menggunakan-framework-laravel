<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PengembalianController extends Controller
{
    

    public function dasboard_pengembalian(){
        $peminjaman = DB::table('peminjaman')->paginate(10);
        return view('dasboard_kembali', ['peminjaman' => $peminjaman]);
    }

    public function edit($Kode)
    {
    // mengambil data peminjam berdasarkan id yang dipilih
    $peminjaman = DB::table('peminjaman')->where('nomor_anggota',$Kode)->get();
    // passing data peminjam yang didapat ke view edit_kembali.blade.php
    return view('edit_kembali',['peminjaman' => $peminjaman]);
 
    }

    public function update(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nomor_anggota' => 'required|exists:peminjaman,nomor_anggota', // memastikan nomor_anggota ada di tabel
            'diterima' => 'required|date',
            'denda' => 'nullable|integer|max:20000', // Denda boleh kosong, tapi jika diisi harus berupa bilangan bulat
        ]);
    
        try {
            // Update data peminjaman
            DB::table('peminjaman')
                ->where('nomor_anggota', $request->nomor_anggota)
                ->update([
                    'diterima' => $request->diterima,
                    'denda' => $request->denda,
                ]);
    
            // Alihkan halaman ke halaman dashboard_kembali
            return redirect('/dasboard_kembali')->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            // Log kesalahan jika terjadi
            \Log::error('Error saat mengupdate data peminjaman:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }
    


    public function cari(Request $request)
    {
    // menangkap data pencarian
    $cari = $request->cari;
     
         // mengambil data dari table pegawai sesuai pencarian data
    $peminjaman = DB::table('peminjaman')
    ->where('nama_anggota','like',"%".$cari."%")
    ->paginate();
     
         // mengirim data pegawai ke view index
    return view('dasboard_kembali',['peminjaman' => $peminjaman]);
     
    }
}
