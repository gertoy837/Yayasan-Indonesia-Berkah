<?php

namespace App\Imports;

use App\Models\Mutabaah;
use Maatwebsite\Excel\Concerns\ToModel;

class MutabaahImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mutabaah([
            //
        ]);
    }
}
