<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('siswa', [App\Http\Controllers\SiswaController::class, 'index'])->name('siswa');
     


