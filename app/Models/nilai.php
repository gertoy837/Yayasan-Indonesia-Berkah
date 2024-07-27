<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    protected $fillable = [
        'user_id',
        'Adab',
        'Aqidah',
        'Akhlak',
        'IT',
        'Fiqih',
        'Hadis',
        'BahasaInggris',
        'BahasaArab',
        'Quran',
        'Public_Speaking',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
