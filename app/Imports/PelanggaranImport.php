<?php

namespace App\Imports;

use App\Models\Pelanggaran;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PelanggaranImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $index = 3;
        $users = User::where('role', 'santri')->get();
        // dd($collection);

        foreach ($collection as $row) {
            if ($index > 5) {
                foreach ($users as $item) {
                    if ($item->username == $row['1'] || $item->nama_lengkap == $row['1']) {
                        $data['user_id'] = $item->id;
                    }
                }
                $data['nama_pelanggaran'] = !empty($row['3']) ? $row['3'] : '';
                $data['kategori_pelanggaran'] = !empty($row['4']) ? $row['4'] : '';
                $data['deskripsi_pelanggaran'] = !empty($row['5']) ? $row['5'] : '';
                $excelDate = $row['2'];
                $date = Carbon::instance(Date::excelToDateTimeObject($excelDate))->toDate();
                $data['tglpelanggaran'] = $date->format('Y-m-d');
                
                Pelanggaran::create($data);
            }

            $index++;
        }
    }
}
