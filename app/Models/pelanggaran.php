<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;

    protected $table = 'pelanggaran';

    protected $dates = ['tglpelanggaran'];
    protected $fillable = [
        'nama_pelanggaran',
        'kategori_pelanggaran',
        'deskripsi_pelanggaran',
        'tglpelanggaran',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
