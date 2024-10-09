<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  // Reset cached roles and permissions
        //  app()['cache']->forget('spatie.permission.cache');

        //  // create permissions
        //  Permission::create(['name' => 'create user']);
        //  Permission::create(['name' => 'read users']);
        //  Permission::create(['name' => 'update user']);
        //  Permission::create(['name' => 'delete user']);
 
        //  Permission::create(['name' => 'create role']);
        //  Permission::create(['name' => 'read roles']);
        //  Permission::create(['name' => 'update role']);
        //  Permission::create(['name' => 'delete role']);
 
        //  Permission::create(['name' => 'create permission']);
        //  Permission::create(['name' => 'read permissions']);
        //  Permission::create(['name' => 'update permission']);
        //  Permission::create(['name' => 'delete permission']);
 
        //  // create roles and assign created permissions
 
        //  $role = Role::create(['name' => 'estudiante']);
        //  $role->givePermissionTo('read users');
        //  $role->givePermissionTo('update user');
 
        //  $role = Role::create(['name' => 'docente']);
        //  $role->givePermissionTo('create user');
        //  $role->givePermissionTo('read users');
        //  $role->givePermissionTo('update user');
        //  $role->givePermissionTo('delete user');
 
        //  $role = Role::create(['name' => 'decano']);
        //  $role->givePermissionTo(Permission::all());

         // Crear roles si no existen
         Role::firstOrCreate(['name' => 'estudiante']);
         Role::firstOrCreate(['name' => 'docente']);
         Role::firstOrCreate(['name' => 'decano']);
    }
}
