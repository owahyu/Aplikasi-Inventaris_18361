<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levelAdmin = Level::where('nama_level', 'administrator')->first();
        $levelOperator = Level::where('nama_level', 'operator')->first();
        $levelKepala = Level::where('nama_level', 'kepala_gudang')->first();

        // if (!$levelAdmin || !$levelOperator || !$levelKepala) {
        //     Log::error('One or more level records could not be found. Aborting Petugas seeding.');
        //     return;
        // }

        Petugas::create([
            'username' => 'admin',
            'password' => bcrypt('12341234'),
            'nama_petugas' => 'Admin',
            'id_level' => $levelAdmin->id_level
        ]);

        Petugas::create([
            'username' => 'operator',
            'password' => bcrypt('12341234'),
            'nama_petugas' => 'Operator',
            'id_level' => $levelOperator->id_level
        ]);

        Petugas::create([
            'username' => 'kepala',
            'password' => bcrypt('12341234'),
            'nama_petugas' => 'Kepala Gudang',
            'id_level' => $levelKepala->id_level
        ]);
    }
}
