<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KwitansiExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $id_transaksi;

    public function __construct($id_transaksi)
    {
        $this->id_transaksi = $id_transaksi;
    }

    public function collection()
    {
        return Transaksi::where('id', $this->id_transaksi)->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Siswa',
            'NISN',
            'Kelas',
            'Tipe Pembayaran',
            'Bulan',
            'Tagihan',
            'Bayar',
            'Sisa',
            'Keterangan',
            'Tanggal Transaksi',
        ];
    }

    public function map($transaksi): array
    {
        return [
            $transaksi->id,
            $transaksi->siswa->nama_siswa ?? '-',
            $transaksi->siswa->nisn ?? '-',
            $transaksi->siswa->kelas->tingkat ?? '-' . ' ' . $transaksi->siswa->kelas->jurusan ?? '-',
            $transaksi->tipe,
            \Carbon\Carbon::parse($transaksi->bulan)->translatedFormat('F Y'),
            number_format($transaksi->tagihan, 0, ',', '.'),
            number_format($transaksi->bayar, 0, ',', '.'),
            number_format($transaksi->sisa, 0, ',', '.'),
            $transaksi->keterangan ?? '-',
            $transaksi->created_at->format('d-m-Y'),
        ];
    }
}
