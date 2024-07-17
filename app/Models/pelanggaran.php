<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggaran extends Model
{
    use HasFactory;
    protected $dates = ['tglpelanggaran'];
    protected $fillable = [
        'nama_pelanggaran',
        'kategori_pelanggaran',
        'deskripsi_pelanggaran',
        'tglpelanggaran',
        'santri_id',
    ];
    public function santri()
    {
        return $this->belongsTo(Santri::class, 'santri_id');
    }
}
