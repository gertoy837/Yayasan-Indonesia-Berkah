<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_prestasi',
        'kategori_prestasi',
        'keterangan_prestasi',
        'tglprestasi',
        'santri_id',
    ];

    protected $dates = ['tglprestasi']; // This tells Eloquent that 'tglprestasi' should be treated as a date

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
