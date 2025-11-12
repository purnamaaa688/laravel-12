<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    public $timestamps = true;
    
    protected $fillable = [
        'namasiswa',
        'jeniskelamin',
        'tempatlahir',
        'tanggallahir',
        'alamat',
        'nohp',
        'email',
        'NISN',
    ];
}
