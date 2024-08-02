<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class SantriImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $index = 3;

        foreach ($collection as $row) {
            if ($index > 10) {
                // foreach ($users as $item) {
                //     if ($item->username == $row['1'] || $item->nama_lengkap == $row['1']) {
                //         $data['user_id'] = $item->id;
                //     }
                // }
                $data['Nama_Lengkap'] = !empty($row['2']) ? $row['2'] : '';
                $data['jk_santri'] = !empty($row['10']) ? $row['10'] : '';
                $data['alamat_santri'] = !empty($row['15']) ? $row['15'] : '';

                $excelDate = $row['20'];
                $date = Carbon::instance(Date::excelToDateTimeObject($excelDate))->toDate();
                $data['tahun_angkatan_santri'] = $date->format('Y');
                
                $tahun = !empty($row['14']) ? $row['14'] : '';
                $bulan = !empty($row['13']) ? $row['13'] : '';
                $hari = !empty($row['12']) ? $row['12'] : '';
                $data['tgllahir_santri'] = $tahun .'-'. $bulan .'-'. $hari;
                
                // Nilai::create($data);
                dd($data);
            }

            $index++;
        }
    }
}
