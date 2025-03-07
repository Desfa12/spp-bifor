<?php

namespace App\Exports;

use App\Models\Datasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class DatasiswaExport implements FromCollection
{
    public function collection()
    {
        return Datasiswa::all();
    }
}
