<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';

    protected $fillable = ['tanggal_pinjam', 'tanggal_kembali', 'status_peminjaman', 'id_pegawai'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }

    public function detailPinjam()
    {
        return $this->hasMany(DetailPinjam::class, 'id_peminjaman');
    }
}
