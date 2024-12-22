<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void {
        $role = Role::create([
            'name'         => 'superadmin',
            'display_name' => 'سوبر ادمن',
        ]);

        $role->permissions()->attach(Permission::all());
    }
}