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
        public function store(Request $request)
{
    $mapel = Mapel::create($request->validate([
        'namamapel' => 'required|string',
        'kodemapel' => 'required|string',
        'jampelajaran' => 'required|integer'
    ]));

    return response()->json(['success' => true, 'mapel' => $mapel]);
}

public function update(Request $request, $id)
{
    $mapel = Mapel::findOrFail($id);
    $mapel->update($request->validate([
        'namamapel' => 'required|string',
        'kodemapel' => 'required|string',
        'jampelajaran' => 'required|integer'
    ]));

    return response()->json(['success' => true, 'mapel' => $mapel]);
}

public function destroy($id)
{
    $mapel = Mapel::findOrFail($id);
    $mapel->delete();
    return response()->json(['success' => true]);
}

}
