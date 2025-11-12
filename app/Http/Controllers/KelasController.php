<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas', compact('kelas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'namakelas' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
        ]);

        Kelas::create($data);

        return redirect()->route('kelas')->with('success', 'Data kelas berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $data = $request->validate([
            'namakelas' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
        ]);

        $kelas->update($data);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Data kelas berhasil diperbarui.', 'data' => $kelas]);
        }

        return redirect()->route('kelas')->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        if (request()->expectsJson()) {
            return response()->json(['message' => 'Data kelas berhasil dihapus.']);
        }

        return redirect()->route('kelas')->with('success', 'Data kelas berhasil dihapus.');
    }
}
