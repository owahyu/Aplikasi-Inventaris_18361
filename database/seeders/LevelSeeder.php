<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::create(['nama_level' => 'administrator']);
        Level::create(['nama_level' => 'operator']);
        Level::create(['nama_level' => 'kepala_gudang']);

        // $levels = Level::all();
        // Log::info("Levels created: " . $levels->pluck('nama_level'));
    }
}
