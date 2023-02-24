<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        // Eloquent ORM
        // Penggunaan model
        $karyawan = Karyawan::with('jabatan')->get();

        // return $karyawan;
        return view('data-karyawan', [
            'karyawan' => $karyawan
        ]);
    }
}
