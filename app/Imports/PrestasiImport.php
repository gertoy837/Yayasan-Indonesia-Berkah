<?php
namespace App\Imports;

use App\Models\Prestasi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class PrestasiImport implements ToModel
{
    public function model(array $row)
    {
        // Lakukan debugging untuk memastikan bahwa header sesuai
        dd($row);

        return new Prestasi([
            'nama_prestasi' => $row['nama_prestasi'],
            'kategori_prestasi' => $row['kategori_prestasi'],
            'keterangan_prestasi' => $row['keterangan_prestasi'],
            'tglprestasi' => Carbon::createFromFormat('Y-m-d', $row['tglprestasi'])->format('Y-m-d'),
            'santri_id' => $row['santri_id'],
        ]);
    }
}
