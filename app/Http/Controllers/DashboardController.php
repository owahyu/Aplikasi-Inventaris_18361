<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Pegawai;
use App\Models\Peminjaman;
use App\Models\Petugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPetugas = Petugas::count();
        $totalInventaris = Inventaris::count();
        $totalPeminjaman = Peminjaman::count();
        $totalPegawai = Pegawai::count();

        return view('pages.dashboard.index', [
            'totalPetugas' => $totalPetugas,
            'totalInventaris' => $totalInventaris,
            'totalPeminjaman' => $totalPeminjaman,
            'totalPegawai' => $totalPegawai,
        ]);
    }
}
