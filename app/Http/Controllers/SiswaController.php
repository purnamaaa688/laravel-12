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

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'namasiswa' => 'required|string|max:255',
            'jeniskelamin' => 'nullable|string|max:5',
            'tempatlahir' => 'nullable|string|max:255',
            'tanggallahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'nohp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'NISN' => 'nullable|string|max:50',
        ]);

        Siswa::create($data);

        return redirect()->route('siswa')->with('success', 'Data siswa berhasil disimpan.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        
        $data = $request->validate([
            'namasiswa' => 'required|string|max:255',
            'jeniskelamin' => 'nullable|string|max:5',
            'tempatlahir' => 'nullable|string|max:255',
            'tanggallahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'nohp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'NISN' => 'nullable|string|max:50',
        ]);

        $siswa->update($data);

        // Return JSON if AJAX request
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Data siswa berhasil diperbarui.', 'data' => $siswa]);
        }

        return redirect()->route('siswa')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        // Return JSON if AJAX request
        if (request()->expectsJson()) {
            return response()->json(['message' => 'Data siswa berhasil dihapus.']);
        }

        return redirect()->route('siswa')->with('success', 'Data siswa berhasil dihapus.');
    }

  }
