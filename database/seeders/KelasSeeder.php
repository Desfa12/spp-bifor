<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel kelas.
     */
    public function run(): void
    {
        $data = [
            ['tingkat' => 'X', 'jurusan' => 'RPL', 'angkatan' => '2023'],
            ['tingkat' => 'XI', 'jurusan' => 'RPL', 'angkatan' => '2022'],
            ['tingkat' => 'XII', 'jurusan' => 'RPL', 'angkatan' => '2021'],
            ['tingkat' => 'X', 'jurusan' => 'MULTIMEDIA', 'angkatan' => '2023'],
            ['tingkat' => 'XI', 'jurusan' => 'MULTIMEDIA', 'angkatan' => '2022'],
            ['tingkat' => 'XII', 'jurusan' => 'MULTIMEDIA', 'angkatan' => '2021'],
            ['tingkat' => 'X', 'jurusan' => 'PEMASARAN', 'angkatan' => '2024'],
            ['tingkat' => 'XI', 'jurusan' => 'PEMASARAN', 'angkatan' => '2023'],
            ['tingkat' => 'XII', 'jurusan' => 'PEMASARAN', 'angkatan' => '2022'],
            ['tingkat' => 'X', 'jurusan' => 'AKUNTANSI', 'angkatan' => '2024'],
            ['tingkat' => 'XI', 'jurusan' => 'AKUNTANSI', 'angkatan' => '2023'],
            ['tingkat' => 'XII', 'jurusan' => 'AKUNTANSI', 'angkatan' => '2022'],
            ['tingkat' => 'X', 'jurusan' => 'TKJ', 'angkatan' => '2024'],
            ['tingkat' => 'XI', 'jurusan' => 'TKJ', 'angkatan' => '2023'],
            ['tingkat' => 'XII', 'jurusan' => 'TKJ', 'angkatan' => '2022'],
        ];

        DB::table('kelas')->insert($data);
    }
}
