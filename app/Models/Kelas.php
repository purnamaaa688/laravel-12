<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    public $timestamps = true;

    protected $fillable = [
        'namakelas',
        'lokasi',
    ];
}
