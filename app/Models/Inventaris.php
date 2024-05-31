<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $table = 'inventaris';
    protected $primaryKey = 'id_inventaris';
    protected $dates = ['tanggal_register'];

    protected $fillable = [
        'nama', 'kondisi', 'keterangan', 'jumlah', 'id_jenis', 'tanggal_register',
        'id_ruang', 'kode_inventaris', 'id_petugas'
    ];

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang');
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'id_jenis');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }

    public function detailPinjam()
    {
        return $this->hasMany(DetailPinjam::class, 'id_detail_pinjam');
    }
}
