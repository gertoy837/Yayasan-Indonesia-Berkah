<?php

namespace App\Imports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;


class SantriImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Santri([
            'nama_santri' => $row['nama_santri'],
            'jk_santri' => $row['jk_santri'],
            'angkatan_santri' => $row['angkatan_santri'],
            'tgllahir_santri' => $row['tgllahir_santri'],
            'domisili_santri' => $row['domisili_santri'],
            'alamat_santri' => $row['alamat_santri'],
            'photo_santri' => $row['photo_santri'] ?? null,
        ]);
    }
}
