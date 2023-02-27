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
        // insert data ke table karyawan
        $karyawan = Karyawan::create([
            'nama_karyawan' => $request->nama_karyawan,
            'jabatan_id' => $request->jabatan_id
        ]);

        // alihkan halaman ke halaman karyawan
        return redirect('/karyawan');
    }

    // method untuk edit data karyawan
    public function edit($id)
    {
        $karyawan = Karyawan::findorfail($id);
        $jabatan = Jabatan::all();
        return view('edit-karyawan', compact('karyawan', 'jabatan'));
    }

    public function update(Request $request){
        $karyawan = Karyawan::findorfail($request->id);
        $karyawan_data = [
            'nama_karyawan' => $request->nama_karyawan,
            'jabatan_id' => $request->jabatan_id
        ];
        $karyawan->update($karyawan_data);
        return redirect('/karyawan');
    }

    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('karyawan')->where('id', $id)->delete();

        // alihkan halaman ke halaman pegawai
        return redirect('/karyawan');
    }
}
