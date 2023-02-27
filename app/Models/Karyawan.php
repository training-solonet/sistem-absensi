<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $fillable = ['id','nama_karyawan','jabatan_id'];
    
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
