<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
class GuruController extends Controller
{
      public function index()
    {
        $guru=Guru::all();
        return view('guru',compact('guru')); 
    }

}
