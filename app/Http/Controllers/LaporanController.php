<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporan_buku(){
        $books = DB::table('buku')->paginate(10);
        return view('laporan_buku',['books'=>$books]);
    }

    public function laporan_anggota(){
        $members =DB::table('siswa')->get();
        return view('laporan_anggota',['members'=>$members]);
    }

    public function laporan_non_siswa(){
        $members =DB::table('non_siswa')->get();
        return view('laporan_non_siswa',['members'=>$members]);
    }

    public function laporan_peminjaman(){
        $peminjaman =DB::table('peminjaman')->get();
        return view('laporan_peminjaman',['peminjaman'=>$peminjaman]);
    }

    public function laporan_pengembalian(){
        $peminjaman =DB::table('peminjaman')->get();
        return view('laporan_pengembalian',['peminjaman'=>$peminjaman]);
    }
}
