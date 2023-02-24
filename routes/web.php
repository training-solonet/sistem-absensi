<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\Jabatan2Controller;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function(){
    return view('index');   
});

//CRUD Jabatan
Route::get('/jabatan', [JabatanController::class,'index'])->name('jabatan');
Route::get('/jabatan/tambah', [JabatanController::class,'tambah'])->name('tambahjabatan');
Route::post('/jabatan/store', [JabatanController::class,'store'])->name('prosestambahjabatan');
Route::get('/jabatan/hapus/{id}', [JabatanController::class,'hapus'])->name('hapusjabatan');
Route::get('/jabatan/cari', [JabatanController::class,'cari'])->name('carijabatan');

//CRUD Karyawan
Route::get('/karyawan', [KaryawanController::class,'index'])->name('viewDataKaryawan');

// route untuk jabatan2
Route::resource('jabatan2', Jabatan2Controller::class);