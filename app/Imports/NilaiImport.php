<?php

namespace App\Imports;

use App\Models\Nilai;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class NilaiImport implements ToCollection
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
                $data['Adab'] = !empty($row['2']) ? $row['2'] : '';
                $data['Aqidah'] = !empty($row['3']) ? $row['3'] : '';
                $data['Akhlak'] = !empty($row['4']) ? $row['4'] : '';
                $data['IT'] = !empty($row['5']) ? $row['5'] : '';
                $data['Fiqih'] = !empty($row['6']) ? $row['6'] : '';
                $data['Hadis'] = !empty($row['7']) ? $row['7'] : '';
                $data['BahasaInggris'] = !empty($row['8']) ? $row['8'] : '';
                $data['BahasaArab'] = !empty($row['9']) ? $row['9'] : '';
                $data['Quran'] = !empty($row['10']) ? $row['10'] : '';
                $data['Public_Speaking'] = !empty($row['11']) ? $row['11'] : '';
                
                Nilai::create($data);
            }

            $index++;
        }
    }
}
