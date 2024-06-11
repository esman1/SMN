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
        $soportec = User::create([
            'name' => 'Oscar Daniel Labastida Vazquez', 
            'email' => 'dlabastida@smn.com.mx',
            'password' => Hash::make('Smn2024.')
        ]);
        $soportec->assignRole('Soportec'); 
        $soportec = User::create([
            'name' => 'Albert Salmeron Cardoso ', 
            'email' => 'asalmeron@smn.com.mx',
            'password' => Hash::make('Smn2024.')
        ]);
        $soportec->assignRole('Soportec'); 
        $soportec = User::create([
            'name' => 'Jesus Abdelrrague Nieto', 
            'email' => 'jabdelrrague@smn.com.mx',
            'password' => Hash::make('Smn2024.')
        ]);
        $soportec->assignRole('Soportec'); 
        $soportec = User::create([
            'name' => 'Cesar Antonio Martinez', 
            'email' => 'cantonio@smn.com.mx',
            'password' => Hash::make('Smn2024.')
        ]);
        $soportec->assignRole('Soportec'); 
        $soportec= User::create([
            'name' => 'Alejandro Guerrero Zavala', 
            'email' => 'eguerreo@smn.com.mx',
            'password' => Hash::make('Smn2024.')
        ]);
        $soportec->assignRole('Soportec'); 
        $soportec = User::create([
            'name' => 'Jazmin Cortes Hernandez', 
            'email' => 'jcortes@smn.com.mx',
            'password' => Hash::make('Smn2024.')
        ]); 
        $soportec->assignRole('Soportec'); 
        // Creating Product Manager User
        $invitado = User::create([
            'name' => 'Daniel Labastida Vazquez', 
            'email' => 'dlabastda@smn.com.mx',
            'password' => Hash::make('1234')
        ]);
        $invitado->assignRole('Invitado');
     
    }
}