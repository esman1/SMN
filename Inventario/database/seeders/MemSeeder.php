<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Memoria;
use Illuminate\Support\Facades\Hash;

class MemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Memoria::create([
            'tipoMem' => '4 GB'
        ]);
    }
}
