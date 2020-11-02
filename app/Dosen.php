<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = ['id_dosen', 'nama', 'alamat', 'jabatan', 'no_telp'];
}
