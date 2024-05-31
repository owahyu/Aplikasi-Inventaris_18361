<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $table = 'ruang';
    protected $primaryKey = 'id_ruang';

    protected $fillable = ['nama_ruang', 'kode_ruang', 'keterangan'];

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class, 'id_ruang');
    }
}
