<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create-role',
            'edit-role',
            'delete-role',
            'create-user',
            'edit-user',
            'delete-user',
            'create-product',
            'edit-product',
            'delete-product',
            'create-empleado', 
            'edit-empleado', 
            'delete-empleado',
            'show-empleado',
            'create-stock',
            'edit-stock',
            'show-stock',
            'delete-stock',
            'create-asigaper',
            'show-asigaper',
            'edit-asigaper',
            'delete-asigaper',
            'create-puesto',
            'show-puesto',
            'edit-puesto',
            'delete-puesto'
         ];
 
          // Looping and Inserting Array's Permissions into Permission Table
         foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
          }
    }
}
