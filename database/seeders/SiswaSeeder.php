<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswaData = [
            ['nis' => '1001', 'nisn' => '2001', 'nama_siswa' => 'Andi Saputra', 'kelas' => 'X', 'jurusan' => 'RPL', 'jenis_kelamin' => 'L', 'tgl_lahir' => '2007-01-15', 'no_telp' => '081234567890'],
            ['nis' => '1002', 'nisn' => '2002', 'nama_siswa' => 'Budi Santoso', 'kelas' => 'XI', 'jurusan' => 'MULTIMEDIA', 'jenis_kelamin' => 'L', 'tgl_lahir' => '2006-05-22', 'no_telp' => '081234567891'],
            ['nis' => '1003', 'nisn' => '2003', 'nama_siswa' => 'Citra Dewi', 'kelas' => 'XII', 'jurusan' => 'PEMASARAN', 'jenis_kelamin' => 'P', 'tgl_lahir' => '2005-09-10', 'no_telp' => '081234567892'],
            ['nis' => '1004', 'nisn' => '2004', 'nama_siswa' => 'Dian Prasetyo', 'kelas' => 'X', 'jurusan' => 'RPL', 'jenis_kelamin' => 'L', 'tgl_lahir' => '2007-03-05', 'no_telp' => '081234567893'],
            ['nis' => '1005', 'nisn' => '2005', 'nama_siswa' => 'Eka Wijaya', 'kelas' => 'XI', 'jurusan' => 'MULTIMEDIA', 'jenis_kelamin' => 'P', 'tgl_lahir' => '2006-07-18', 'no_telp' => '081234567894'],
            ['nis' => '1006', 'nisn' => '2006', 'nama_siswa' => 'Fajar Ramadhan', 'kelas' => 'XII', 'jurusan' => 'PEMASARAN', 'jenis_kelamin' => 'L', 'tgl_lahir' => '2005-02-14', 'no_telp' => '081234567895'],
            ['nis' => '1007', 'nisn' => '2007', 'nama_siswa' => 'Gina Anggraini', 'kelas' => 'X', 'jurusan' => 'RPL', 'jenis_kelamin' => 'P', 'tgl_lahir' => '2007-11-22', 'no_telp' => '081234567896'],
            ['nis' => '1008', 'nisn' => '2008', 'nama_siswa' => 'Hendra Saputra', 'kelas' => 'XI', 'jurusan' => 'MULTIMEDIA', 'jenis_kelamin' => 'L', 'tgl_lahir' => '2006-04-30', 'no_telp' => '081234567897'],
            ['nis' => '1009', 'nisn' => '2009', 'nama_siswa' => 'Indra Kurniawan', 'kelas' => 'XII', 'jurusan' => 'PEMASARAN', 'jenis_kelamin' => 'L', 'tgl_lahir' => '2005-06-12', 'no_telp' => '081234567898'],
            ['nis' => '1010', 'nisn' => '2010', 'nama_siswa' => 'Joko Riyadi', 'kelas' => 'X', 'jurusan' => 'RPL', 'jenis_kelamin' => 'L', 'tgl_lahir' => '2007-10-08', 'no_telp' => '081234567899'],
            ['nis' => '1011', 'nisn' => '2011', 'nama_siswa' => 'Kiki Amelia', 'kelas' => 'XI', 'jurusan' => 'MULTIMEDIA', 'jenis_kelamin' => 'P', 'tgl_lahir' => '2006-08-25', 'no_telp' => '081234567900'],
            ['nis' => '1012', 'nisn' => '2012', 'nama_siswa' => 'Lina Maulida', 'kelas' => 'XII', 'jurusan' => 'PEMASARAN', 'jenis_kelamin' => 'P', 'tgl_lahir' => '2005-12-05', 'no_telp' => '081234567901'],
            ['nis' => '1013', 'nisn' => '2013', 'nama_siswa' => 'Mira Septiani', 'kelas' => 'X', 'jurusan' => 'RPL', 'jenis_kelamin' => 'P', 'tgl_lahir' => '2007-09-19', 'no_telp' => '081234567902'],
            ['nis' => '1014', 'nisn' => '2014', 'nama_siswa' => 'Novi Yulianti', 'kelas' => 'XI', 'jurusan' => 'MULTIMEDIA', 'jenis_kelamin' => 'P', 'tgl_lahir' => '2006-02-28', 'no_telp' => '081234567903'],
            ['nis' => '1015', 'nisn' => '2015', 'nama_siswa' => 'Oki Setiawan', 'kelas' => 'XII', 'jurusan' => 'PEMASARAN', 'jenis_kelamin' => 'L', 'tgl_lahir' => '2005-07-01', 'no_telp' => '081234567904'],
        ];

        // Insert data ke dalam tabel siswa
        DB::table('siswa')->insert($siswaData);
    }
}
