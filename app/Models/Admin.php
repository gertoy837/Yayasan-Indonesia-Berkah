<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public function prestasi(){
        return $this->belongsTo(prestasi::class);
    }public function pelanggaran(){
        return $this->belongsTo(pelanggaran::class);
    }


    protected $fillable = [
        'nama_santri', 
        'jk_santri', 
        'angkatan_santri', 
        'tgllahir_santri', 
        'domisili_santri', 
        'alamat_santri'
    ];

    public function dashboard()
    {
        return $this->belongsTo(dashboard::class);
    }
}
