<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('siswa', [App\Http\Controllers\SiswaController::class, 'index'])->name('siswa');
Route::get('kelas', [App\Http\Controllers\KelasController::class, 'index'])->name('kelas');
Route::get('guru', [App\Http\Controllers\GuruController::class, 'index'])->name('guru');
Route::get('matapelajaran', [App\Http\Controllers\MapelController::class, 'index'])->name('matapelajaran');
     


