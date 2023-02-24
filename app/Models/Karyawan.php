<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    public function jabatan()
    {
        return $this->belongsTo('App\Models\Jabatan');
    }
}
