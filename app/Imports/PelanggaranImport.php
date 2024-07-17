<?php
namespace App\Imports;

use App\Models\Pelanggaran;
use Maatwebsite\Excel\Concerns\ToModel;

class PelanggaranImport implements ToModel
{
    public function model(array $row)
    {
        return new Pelanggaran([
            'nama_pelanggaran' => $row[0],
            'kategori_pelanggaran' => $row[1],
            'deskripsi_pelanggaran' => $row[2],
            'tglpelanggaran' => $row[3],
            'santri_id' => $row[4],
        ]);
    }
}
