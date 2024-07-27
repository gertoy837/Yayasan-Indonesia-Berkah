<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'nama_lengkap',
        'email',
        'password',
        'role', // pastikan 'role' ada di sini
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function santri()
    {
        return $this->hasOne(Santri::class, 'user_id', 'id');
    }

    public function pelanggaran()
    {
        return $this->hasMany(pelanggaran::class);
    }

    public function nilai()
    {
        return $this->hasMany(nilai::class);
    }

    // Tambahkan metode ini untuk memeriksa role
    public function isAdmin() {
        return $this->role === 'admin';
    }

    public function isSantri() {
        return $this->role === 'santri';
    }

    public function isDonatur() {
        return $this->role === 'donatur';
    }
}
