<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JabatanController2;
use App\Http\Controllers\KaryawanController;
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
    return view('index');
});

Route::get('/index', function(){
    return view('index');   
});
// //CRUD Jabatan
// Route::get('/jabatan', [JabatanController::class,'index'])->name('jabatan');
// Route::get('/jabatan/tambah', [JabatanController::class,'tambah'])->name('tambahjabatan');
// Route::post('/jabatan/store', [JabatanController::class,'store'])->name('prosestambahjabatan');
// Route::get('/jabatan/hapus/{id}', [JabatanController::class,'hapus'])->name('hapusjabatan');
// Route::get('/jabatan/cari', [JabatanController::class,'cari'])->name('carijabatan');

//CRUD Karyawan
Route::get('/karyawan', [KaryawanController::class,'index'])->name('viewDataKaryawan');
Route::get('/karyawan/tambah', [KaryawanController::class,'tambah'])->name('tambahDataKaryawan');
Route::post('/karyawan/store', [KaryawanController::class,'store'])->name('prosestambahKaryawan');
Route::get('/karyawan/edit/{id}', [KaryawanController::class,'edit'])->name('editDataKaryawan');
Route::post('/karyawan/update',[KaryawanController::class,'update']);
Route::get('/karyawan/hapus/{id}',[KaryawanController::class,'hapus']);

//CRUD Jabatan Resource
Route::resource('jabatan', JabatanController2::class);