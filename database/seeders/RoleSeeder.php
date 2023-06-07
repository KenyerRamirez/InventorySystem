<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'User']);

        Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.update'])->syncRoles([$role1]);

        Permission::create(['name' => 'articulos.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'articulos.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'articulos.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'articulos.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'audits.index'])->syncRoles([$role1]);

        Permission::create(['name' => 'panaderiaingresos.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'panaderiaingresos.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'panaderiaingresos.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'panaderiaingresos.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'panaderiaventas.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'panaderiaventas.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'panaderiaventas.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'panaderiaventas.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'novedades.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'novedades.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'novedades.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'novedades.destroy'])->syncRoles([$role1]);
    }
}
