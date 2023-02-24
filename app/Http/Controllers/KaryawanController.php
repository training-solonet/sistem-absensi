<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        //ORM
        $karyawan = Karyawan::with('jabatan')->get();
        return view('data-karyawan', ['karyawan' => $karyawan]);

        // //QueryBuilder
        // $karyawan = DB::table('karyawan')->get();
        // return view('data-karyawan', ['karyawan' => $karyawan]);
    }
    public function tambah()
    {
        $jabatan = Jabatan::all();
        return view('tambah-karyawan', ['jabatan' => $jabatan]);
    }

    public function store(Request $request)
    {
        // insert data ke table jabatan
        DB::table('karyawan')->insertUsing([
            'nama_karyawan' => $request->nama_karyawan,
            'jabatan_id'->where(DB::table('jabatan')->select(
                'id'
            )->where('nama_jabatan', '=', $request->nama_jabatan))
        ]); 
        
        // alihkan halaman ke halaman jabatan
        return redirect('/karyawan');
    }
}
