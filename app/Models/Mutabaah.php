<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutabaah extends Model
{
    use HasFactory;

    protected $table = 'mutabaah';

    protected $fillable = [
        'user_id',
        'tanggal',
        'shubuh',
        'dzuhur',
        'ashar',
        'maghrib',
        'isya',
        'tilawah',
        'al_mulk',
        'solawat',
        'al_kahfi',
        'tahajud',
        'dhuha',
        'rs',
        'rd',
        'rm',
        'ri',
        'dzikir_pagi',
        'dzikir_petang',
        'sahur_senin',
        'sahur_kamis',
        'workout_situp',
        'workout_pushup',
        'workout_run',
        'reading_book',
        'tiga_s',
        'mendoakan_orangtua',
        'bersyukur',
        'mendoakan_oranglain',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
