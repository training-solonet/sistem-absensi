<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Karyawan;
use App\Models\Jabatan;

class ResourceKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ORM
        $jabatan = Jabatan::orderBy('nama_jabatan')->get();
        $karyawan = Karyawan::with('jabatan')->get();
        return view('data-karyawan', compact('jabatan', 'karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // insert data ke table karyawan
        Karyawan::create([
            'nama_karyawan' => strtoupper($request->nama_karyawan),
            'jabatan_id' => strtoupper($request->jabatan_id)
        ]);

        // alihkan halaman ke halaman karyawan
        return redirect('/karyawan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = Karyawan::findorfail($id);
        $jabatan = Jabatan::all();
        return view('edit-karyawan', compact('karyawan', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findorfail($request->id);
        $karyawan_data = [
            'nama_karyawan' => strtoupper($request->nama_karyawan),
            'jabatan_id' => strtoupper($request->jabatan_id)
        ];
        $karyawan->update($karyawan_data);
        return redirect('/karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('karyawan')->where('id', $id)->delete();

        // alihkan halaman ke halaman pegawai
        return redirect('/karyawan');
    }
}
