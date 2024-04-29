<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sisop;
use Illuminate\Support\Facades\Hash;

class SisopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sisop::create([
            'nomSis' => 'Windows 10 Pro 64 Bits'
        ]);
    }
}
