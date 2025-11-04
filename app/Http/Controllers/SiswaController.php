<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
class SiswaController extends Controller
{
    public function index()
    {
        $siswa=Siswa::all();
        return view('siswa',compact('siswa')); 
    }

  }
