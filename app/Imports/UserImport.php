<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $index = 2;
        // dd($collection);

        foreach ($collection as $row) {
            if ($index > 3) {
                $data['username'] = !empty($row['1']) ? $row['1'] : '';
                $data['nama_lengkap'] = !empty($row['2']) ? $row['2'] : '';
                $data['email'] = !empty($row['3']) ? $row['3'] : '';
                $data['password'] = !empty($row['4']) ? Hash::make($row['4']) : '';
                $data['role'] = !empty($row['5']) ? $row['5'] : '';
                
                User::create($data);
            }

            $index++;
        }
    }
}
