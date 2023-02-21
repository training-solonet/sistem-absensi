<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        // mengambil data dari table jabatan
        $jabatan = DB::table('jabatan')->get();

        // mengirim data pegawai ke view index
        return view('data-jabatan', ['jabatan' => $jabatan]);
    }

    // method untuk menampilkan view form tambah jabatan
    public function tambah()
    {
        // memanggil view tambah
        return view('tambah-jabatan');
    }

    // method untuk insert data ke table jabatan
    public function store(Request $request)
    {
        // insert data ke table jabatan
        DB::table('jabatan')->insert([
            'nama_jabatan' => $request->nama_jabatan
        ]);
        // alihkan halaman ke halaman jabatan
        return redirect('/jabatan');
    }

    // method untuk hapus data jabatan
    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('jabatan')->where('id', $id)->delete();

        // alihkan halaman ke halaman pegawai
        return redirect('/jabatan');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $jabatan = DB::table('jabatan')
            ->where('nama_jabatan', 'like', "%" . $cari . "%");

        // mengirim data pegawai ke view index
        return view('data-jabatan', ['jabatan' => $jabatan]);
    }
}
