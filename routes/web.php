<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('siswa', [App\Http\Controllers\SiswaController::class, 'index'])->name('siswa');
Route::post('siswa', [App\Http\Controllers\SiswaController::class, 'store'])->name('siswa.store');
Route::put('siswa/{siswa}', [App\Http\Controllers\SiswaController::class, 'update'])->name('siswa.update');
Route::delete('siswa/{siswa}', [App\Http\Controllers\SiswaController::class, 'destroy'])->name('siswa.destroy');

Route::get('kelas', [App\Http\Controllers\KelasController::class, 'index'])->name('kelas');
Route::post('kelas', [App\Http\Controllers\KelasController::class, 'store'])->name('kelas.store');
Route::put('kelas/{kelas}', [App\Http\Controllers\KelasController::class, 'update'])->name('kelas.update');
Route::delete('kelas/{kelas}', [App\Http\Controllers\KelasController::class, 'destroy'])->name('kelas.destroy');

Route::get('guru', [App\Http\Controllers\GuruController::class, 'index'])->name('guru');
Route::get('matapelajaran', [App\Http\Controllers\MapelController::class, 'index'])->name('matapelajaran');
     


