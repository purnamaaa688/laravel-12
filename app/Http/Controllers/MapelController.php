<?php

namespace App\Http\Controllers;
use App\Models\Mapel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapelController extends Controller
{
        public function index()
        {
            $mapel=\App\Models\Mapel::all();
            return view('mapel',compact('mapel')); 
        }
}
