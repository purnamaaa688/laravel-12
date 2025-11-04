<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
class KelasController extends Controller
{
      public function index()
    {
        $kelas=Kelas::all();
        return view('kelas',compact('kelas')); 
    }

}
