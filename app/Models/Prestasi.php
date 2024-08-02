<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasi';

    protected $fillable = [
        'user_id',
        'nama_prestasi',
        'kategori_prestasi',
        'keterangan_prestasi',
        'tglprestasi',
    ];

    protected $dates = ['tglprestasi']; // This tells Eloquent that 'tglprestasi' should be treated as a date

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
