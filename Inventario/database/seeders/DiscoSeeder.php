<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Discod;
use Illuminate\Support\Facades\Hash;

class DiscoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Discod::create([
            
            
            'nomDis' => '500 GB'
            
        ]);
    }
}
