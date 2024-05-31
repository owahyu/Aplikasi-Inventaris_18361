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
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id('id_inventaris');
            $table->string('nama');
            $table->string('kondisi');
            $table->text('keterangan')->nullable();
            $table->integer('jumlah');
            $table->foreignId('id_jenis')->constrained('jenis', 'id_jenis');
            $table->date('tanggal_register');
            $table->foreignId('id_ruang')->constrained('ruang', 'id_ruang');
            $table->string('kode_inventaris');
            $table->foreignId('id_petugas')->constrained('petugas', 'id_petugas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};
