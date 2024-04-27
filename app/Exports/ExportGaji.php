<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use App\Models\Karyawan;
use App\Models\Penggajian;

class ExportGaji implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = DB::table('karyawans')
            ->join('penggajians', 'karyawans.id', '=', 'penggajians.karyawan_id')
            ->select('karyawans.id', 'karyawans.nama', 'penggajians.total_gaji')
            ->get();

        return $data;
    }

    public function headings(): array
    {
        return [
            'Nomor',
            'Nama Karyawan',
            'Total Gaji',
        ];
    }
}
