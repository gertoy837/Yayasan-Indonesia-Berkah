<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Santri extends Model
{
    use HasFactory;
    
    protected $table = 'santri';

    protected $fillable = [
        'jk_santri', 
        'angkatan_santri',
        'tahun_angkatan_santri',
        'tgllahir_santri', 
        'alamat_santri'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
