<?php

namespace App\Imports;

use App\Models\Datasiswa;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    protected $kelas_id;

    public function __construct($kelas_id)
    {
        $this->kelas_id = $kelas_id;
    }

    public function model(array $row)
    {
        // Konversi tanggal lahir jika berbentuk angka (serial number Excel)
        $tgl_lahir = is_numeric($row['tanggal_lahir'])
            ? Date::excelToDateTimeObject($row['tanggal_lahir'])->format('Y-m-d')
            : $row['tanggal_lahir'];

        // Perbarui jika NIS sudah ada, jika tidak, buat baru
        return Datasiswa::updateOrCreate(
            ['nis' => $row['nis']], // Kondisi pencarian
            [
                'nisn'          => $row['nisn'],
                'nama_siswa'    => $row['nama_siswa'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'tgl_lahir'     => $tgl_lahir,
                'no_telp'       => $row['no_telepon'],
                'id_kelas'      => $this->kelas_id, // Menyesuaikan kelas
            ]
        );
    }
}
