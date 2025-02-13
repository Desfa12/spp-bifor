<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('datasiswa', function (Blueprint $table) {
            $table->id(); // Primary key (id siswa)
            $table->string('nis')->unique(); // Nomor Induk Siswa (unik)
            $table->string('nisn')->unique(); // Nomor Induk Siswa Nasional (unik)
            $table->string('nama_siswa'); // Nama siswa
            $table->string('kelas'); // Kelas siswa
            $table->string('jurusan'); // Jurusan siswa
            $table->enum('jenis_kelamin', ['L', 'P']); // Jenis kelamin (L = Laki-laki, P = Perempuan)
            $table->date('tgl_lahir'); // Tanggal lahir
            $table->string('no_telp'); // Nomor telepon
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Hapus tabel jika rollback.
     */
    public function down(): void
    {
        Schema::dropIfExists('datasiswa');
    }
};
