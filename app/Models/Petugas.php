<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Petugas extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';

    protected $fillable = ['username', 'password', 'nama_petugas', 'id_level'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level');
    }
}
