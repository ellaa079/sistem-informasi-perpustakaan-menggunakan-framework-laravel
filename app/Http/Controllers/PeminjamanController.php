<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function dasboard_peminjaman(){
        $peminjaman = DB::table('peminjaman')->paginate(10);
        return view('dasboard_peminjaman', ['peminjaman' => $peminjaman]);
    }

    public function peminjaman_tambah(){
        return view('peminjaman');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nomor_anggota' => 'required|integer|max:255',
            'tgl_peminjaman' => 'required|date',
            'nama_anggota' => 'required|string|max:255',
            'tgl_pengembalian' => 'required|date',
            'kode_buku.*' => 'required|string|max:255',
            'judul.*' => 'required|string|max:255',
            'pengarang.*' => 'required|string|max:255',
            'penerbit.*' => 'required|string|max:255',
            'jumlah.*' => 'required|integer|min:1',
        ], [
            'nomor_anggota.required' => 'nomor anggota wajib diisi.',
            'tgl_peminjaman.required' => 'tanggal peminjaman wajib diisi.',
            'nama_anggota.required' => 'Nama anggota wajib diisi.',
            'tgl_pengembalian.required' => 'tanggal pengembalian wajib diisi.',
            'kode_buku.*.required' => 'Kode Buku wajib diisi.',
            'judul.*.required' => 'Judul Buku wajib diisi.',
            'pengarang.*.required' => 'Pengarang Buku wajib diisi.',
            'penerbit.*.required' => 'Penerbit Buku wajib diisi.',
            'jumlah.*.required' => 'Jumlah Buku wajib diisi.',
        ]);

        // Simpan data ke database
        DB::table('peminjaman')->updateOrInsert(
            ['nomor_anggota' => $request->nomor_anggota], // Use the correct column name here
            [
                'tgl_peminjaman' => $request->tgl_peminjaman,
                'nama_anggota' => $request->nama_anggota,
                'tgl_pengembalian' => $request->tgl_pengembalian,
                'kode_buku' => json_encode($request->kode_buku),
                'judul' => json_encode($request->judul),
                'pengarang' => json_encode($request->pengarang),
                'penerbit' => json_encode($request->penerbit),
                'jumlah' => json_encode($request->jumlah),
            ]
        );

        foreach ($request->kode_buku as $key => $value) {
            DB::table('peminjaman_details')->insert([
                'kode_buku' => $value,
                'judul' => $request->judul[$key],
                'pengarang' => $request->pengarang[$key],
                'penerbit' => $request->penerbit[$key],
                'jumlah' => $request->jumlah[$key],
            ]);
        }

        // Alihkan halaman ke halaman lain dengan pesan sukses
        return redirect()->route('dasboard_peminjaman')->with('success', 'Data berhasil disimpan.');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $peminjaman = DB::table('peminjaman')
            ->where('nama_anggota', 'like', "%" . $cari . "%")
            ->paginate(10);
        return view('dasboard_peminjaman', compact('peminjaman'));
    }
}
