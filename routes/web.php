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
Route::post('guru', [App\Http\Controllers\GuruController::class, 'store'])->name('guru.store');
Route::put('guru/{guru}', [App\Http\Controllers\GuruController::class, 'update'])->name('guru.update');
Route::delete('guru/{guru}', [App\Http\Controllers\GuruController::class, 'destroy'])->name('guru.destroy');
Route::get('matapelajaran', [App\Http\Controllers\MapelController::class, 'index'])->name('matapelajaran');
     
Route::get('mapel', [App\Http\Controllers\mapelController::class, 'index'])->name('mapel');
Route::post('mapel', [App\Http\Controllers\mapelController::class, 'store'])->name('mapel.store');
Route::put('mapel/{mapel}', [App\Http\Controllers\mapelController::class, 'update'])->name('mapel.update');
Route::delete('mapel/{mapel}', [App\Http\Controllers\mapelController::class, 'destroy'])->name('mapel.destroy');
Route::get('matapelajaran', [App\Http\Controllers\MapelController::class, 'index'])->name('matapelajaran');
     

