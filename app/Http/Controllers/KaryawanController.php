<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function index()
    {
        // mengambil data dari table karyawan
        $karyawan = DB::table('karyawan')->get();

        // mengirim data pegawai ke view index
        return view('data-karyawan', ['karyawan' => $karyawan]);
    }
}
