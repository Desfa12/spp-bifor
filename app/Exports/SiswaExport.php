<?php

namespace App\Exports;

use App\Models\Datasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    protected $kelas_id;

    public function __construct($kelas_id)
    {
        $this->kelas_id = $kelas_id;
    }

    public function collection()
    {
        return Datasiswa::where('id_kelas', $this->kelas_id)
            ->select('nis', 'nisn', 'nama_siswa', 'jenis_kelamin', 'tgl_lahir', 'no_telp')
            ->get();
    }

    public function headings(): array
    {
        return ['NIS', 'NISN', 'Nama Siswa', 'Jenis Kelamin', 'Tanggal Lahir', 'No. Telepon'];
    }
}
