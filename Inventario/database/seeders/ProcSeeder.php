<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Procesador;
use Illuminate\Support\Facades\Hash;

class ProcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Procesador::create([
            'nomProc' => 'Intel Core I3-5005U CPU 2.00 GHZ 2.00GHZ'
        ]);
    }
}
