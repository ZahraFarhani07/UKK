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
        Schema::create('penggajians', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->default(now());;
            $table->text('keterangan');
            $table->foreignId('karyawan_id')->constrained('karyawans')->onDelete('cascade');
            $table->integer('jumlah_gaji');
            $table->integer('jumlah_lembur');
            $table->integer('jumlah_cuti');
            $table->integer('total_gaji');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggajians');
    }
};
