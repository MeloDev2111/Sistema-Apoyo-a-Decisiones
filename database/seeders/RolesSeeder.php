<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $roles = Role::create(['name' => 'Administrador']);
      $roles1 = Role::create(['name'=>'Empleado']);
      $permisos = Permission::create(['name'=>'root']);
      $permisos1 = Permission::create(['name'=>'visor']);
      $roles->givePermissionTo('root');
      $roles1->givePermissionTo('visor');
    }
}
