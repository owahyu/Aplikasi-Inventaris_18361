<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';

    protected $fillable = ['nama_pegawai', 'nip', 'alamat'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_pegawai');
    }
}
