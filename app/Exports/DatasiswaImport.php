<?php

namespace App\Exports;


use App\Models\Datasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class DatasiswaImport implements ToModel
{
    public function model(array $row)
    {
        return new Datasiswa([
            'nis' => $row[0],
            'nisn' => $row[1],
            'nama_siswa' => $row[2],
            'id_kelas' => $row[3],
            'jenis_kelamin' => $row[4],
            'tgl_lahir' => $row[5],
            'no_telp' => $row[6],
        ]);
    }
}
