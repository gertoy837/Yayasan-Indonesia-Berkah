<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    protected $fillable = [
        'user_id',
        'IT',
        'Fiqih',
        'Hadis',
        'BahasaInggris',
        'BahasaArab',
        'Quran',
        'Polygon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
