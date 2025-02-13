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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('bulan')->nullable(); // Kolom untuk bulan pembayaran
            $table->decimal('jumlah_tagihan', 15, 2)->nullable(); // Kolom untuk jumlah tagihan                $table->decimal('telah_dibayar', 15, 2)->nullable(); // Kolom untuk jumlah yang telah dibayar
            $table->decimal('sisa', 15, 2)->nullable(); // Kolom untuk sisa pembayaran
            $table->text('keterangan')->nullable(); // Kolom untuk keterangan pembayaran
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
