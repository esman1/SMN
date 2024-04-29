<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Ezequiel Nahun Perez Carbajal', 
            'email' => 'eperez@smnat.com.mx',
            'password' => Hash::make('Eperez1234.')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Melani Alondra Santana Arvizu', 
            'email' => 'msantana@smn.com.mx',
            'password' => Hash::make('SMN2024.')
        ]);
        $admin->assignRole('Admin');
        $admin = User::create([
            'name' => 'Carlos Landeros Meraz', 
            'email' => 'clanderos@smn.com.mx',
            'password' => Hash::make('Smn2024.')
        ]);
        $admin->assignRole('Admin'); 


        // Creating Product Manager User
        $invitado = User::create([
            'name' => 'Daniel Labastida Vazquez', 
            'email' => 'dlabastida@smn.com.mx',
            'password' => Hash::make('SMN2024.')
        ]);
        $invitado->assignRole('Invitado');
    }
}