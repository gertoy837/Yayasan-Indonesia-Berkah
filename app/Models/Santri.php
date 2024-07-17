<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Santri extends Model
{
    use HasFactory;
    

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class, 'santri_id');
    }

    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class, 'santri_id');
    }

    protected $fillable = [
        'nama_santri', 
        'jk_santri', 
        'angkatan_santri', 
        'tgllahir_santri', 
        'domisili_santri', 
        'alamat_santri'
    ];
}
