<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $invitado = Role::create(['name' => 'Invitado']);
        $soportec = Role::create(['name'=> 'Soporte Tecnico']);

        $admin->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'create-empleado', 
            'edit-empleado', 
            'delete-empleado',
            'show-empleado',
            'create-stock',
            'show-stock',
            'edit-stock',
            'delete-stock',
            'create-asigaper',
            'show-asigaper',
            'edit-asigaper',
            'delete-asigaper',
            'create-puesto',
            'show-puesto',
            'edit-puesto',
            'delete-puesto',
            'create-sucursal',
            'edit-sucursal',
            'delete-sucursal',
            'show-sucursal',
            'create-departamento',
            'show-departamento',
            'edit-departamento',
            'delete-departamento',
            'create-asigsuc',
            'show-asigsuc',
            'edit-asigsuc',
            'delete-asigsuc', 
            'create-valid',
            'show-valid',
            'edit-valid',
            'delete-valid'
            
        ]);
        $soportec->givePermissionTo([
            'create-empleado', 
            'edit-empleado', 
            'delete-empleado',
            'show-empleado',
            'create-stock',
            'show-stock',
            'edit-stock',
            'delete-stock',
            'create-asigaper',
            'show-asigaper',
            'edit-asigaper',
            'delete-asigaper',
            'create-puesto',
            'show-puesto',
            'edit-puesto',
            'delete-puesto',
            'create-sucursal',
            'edit-sucursal',
            'delete-sucursal',
            'show-sucursal',
            'create-departamento',
            'show-departamento',
            'edit-departamento',
            'delete-departamento',
            'create-asigsuc',
            'show-asigsuc',
            'edit-asigsuc',
            'delete-asigsuc', 
            'create-valid',
            'show-valid',
            'edit-valid',
            'delete-valid' 
        ]);

        $invitado->givePermissionTo([
           'show-empleado',
           'show-stock',
           'show-asigaper',
           'show-departamento',
           'show-puesto',
           'show-sucursal',
           'show-asigsuc'
            
        ]);
    }
}
