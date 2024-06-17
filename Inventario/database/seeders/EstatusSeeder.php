<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estatus;
use Illuminate\Support\Facades\Hash;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        // Creating Super Admin User
        Estatus::create([
            
            
            'estat' => 'ALTA'
            
        ]);
        Estatus::create([
            
            
            'estat' => 'BAJA'
            
        ]);
    
}
}