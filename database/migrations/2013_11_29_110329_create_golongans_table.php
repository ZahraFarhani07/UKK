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
        Schema::create('golongans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_golongan', 50);
            $table->foreignId('karyawan_id')->constrained('karyawans');
            $table->integer('gaji_pokok');
            $table->integer('tunjangan_istri');
            $table->integer('tunjangan_anak');
            $table->integer('tunjangan_transport');
            $table->integer('tunjangan_makan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('golongans');
    }
};
