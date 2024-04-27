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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->integer('nik');
            $table->string('nama', 50);
            $table->string('jk', 20);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('no_telp');
            $table->string('agama', 25);
            $table->string('status_nikah', 50);
            $table->text('alamat');
            $table->text('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
