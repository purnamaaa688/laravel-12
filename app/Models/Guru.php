<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    public $timestamps = true;

    protected $fillable = [
        'nama_guru',
        'nip',
        'bidang_studi',
        'email',
        'no_telepon',
    ];
}
