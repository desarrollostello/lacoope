<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use function Ramsey\Uuid\v1;

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
        $role2 = Role::create(['name' => 'Escritor']);

        Permission::create(['name' => 'welcome'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'categories.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'categories.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'categories.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'categories.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'tags.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'tags.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'tags.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'tags.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'news.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'news.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'news.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'news.destroy'])->syncRoles([$role1, $role2]);
    }
}
