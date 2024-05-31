<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'detail_pinjam';
    protected $primaryKey = 'id_detail_pinjam';

    protected $fillable = [
        'id_inventaris',
        'id_peminjaman',
        'jumlah',
    ];

    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class, 'id_inventaris');
    }

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }
}
