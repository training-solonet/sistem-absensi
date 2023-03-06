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
        // //ORM
        // $karyawan = Karyawan::with('jabatan')->get();
        // return view('data-karyawan', ['karyawan' => $karyawan]);

        // // //QueryBuilder
        // // $karyawan = DB::table('karyawan')->get();
        // // return view('data-karyawan', ['karyawan' => $karyawan]);

        if (request()->ajax()) {
            return datatables()->of(Karyawan::with('jabatan')->get())
                ->addColumn('action', 'karyawan-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('data-karyawan', ['karyawan' => $karyawan]);
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

        //function ajax javascript
        $karyawanId = $request->id;

        $karyawan   =   Karyawan::updateOrCreate(
            [
                'id' => $karyawanId
            ],
            [
                'nama_karyawan' => $request->nama_karyawan,
                'jabatan_id' => $request->jabatan_id
            ]
        );

        return Response()->json($karyawan);
    }

    // // method untuk edit data karyawan CRUD non SPA
    // public function edit($id)
    // {
    //     $karyawan = Karyawan::findorfail($id);
    //     $jabatan = Jabatan::all();
    //     return view('edit-karyawan', compact('karyawan', 'jabatan'));
    // }

    //method untuk edit data karyawan CRUD SPA with ajax javascript
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $karyawan  = Karyawan::where($where)->first();
      
        return Response()->json($karyawan);
    }

    public function update(Request $request)
    {
        $karyawan = Karyawan::findorfail($request->id);
        $karyawan_data = [
            'nama_karyawan' => $request->nama_karyawan,
            'jabatan_id' => $request->jabatan_id
        ];
        $karyawan->update($karyawan_data);
        return redirect('/karyawan');
    }

    public function destroy(Request $request)
    {
        $karyawan = Karyawan::where('id',$request->id)->delete();
      
        return Response()->json($karyawan);
    }
}
