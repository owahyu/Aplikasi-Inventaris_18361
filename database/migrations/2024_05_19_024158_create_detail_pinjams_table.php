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
        Schema::create('detail_pinjam', function (Blueprint $table) {
            $table->id('id_detail_pinjam');
            $table->foreignId('id_inventaris')
                ->constrained('inventaris', 'id_inventaris')
                ->onDelete('cascade');
            $table->foreignId('id_peminjaman')
                ->constrained('peminjaman', 'id_peminjaman')
                ->onDelete('cascade');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pinjam');
    }
};
