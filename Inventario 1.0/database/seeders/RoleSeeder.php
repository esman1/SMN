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
            'delete-puesto'
        ]);

        $invitado->givePermissionTo([
           'show-empleado',
           'show-stock',
           'show-asigaper',
            
        ]);
    }
}
