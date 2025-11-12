<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('namasiswa');
            $table->char('jeniskelamin', 1)->nullable(); // L or P
            $table->string('tempatlahir')->nullable();
            $table->date('tanggallahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('nohp')->nullable();
            $table->string('email')->nullable();
            $table->string('NISN')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
