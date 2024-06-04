<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            SuperAdminSeeder::class,
            PuestoSeeder::class,
            DepartamentoSeeder::class,
            SucursalSeeder::class,
            EstatusSeeder::class,
            EmpleadoSeeder::class,
            DiscoSeeder::class,
            MarcaSeeder::class,
            MemSeeder::class,
            ModeloSeeder::class,
            ProcSeeder::class,
            SisopSeeder::class,
            TipoSeeder::class,
            
            
        ]);
    }
}