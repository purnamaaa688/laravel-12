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
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip' => 'nullable|string|max:255',
            'bidang_studi' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'no_telepon' => 'nullable|string|max:50',
        ]);

        Guru::create($data);

        return redirect()->route('guru')->with('success', 'Data guru berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $data = $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip' => 'nullable|string|max:255',
            'bidang_studi' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'no_telepon' => 'nullable|string|max:50',
        ]);

        $guru->update($data);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Data guru berhasil diperbarui.', 'data' => $guru]);
        }

        return redirect()->route('guru')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        if (request()->expectsJson()) {
            return response()->json(['message' => 'Data guru berhasil dihapus.']);
        }

        return redirect()->route('guru')->with('success', 'Data guru berhasil dihapus.');
    }
}
