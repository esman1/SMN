<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipo;
use Illuminate\Support\Facades\Hash;


class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tipo::create([
            'nomTipo' => 'LAPTOP'
        ]);
    }
}
