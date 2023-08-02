<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = Role::pluck('id')->toArray();
        $permissions = Permission::pluck('id')->toArray();

        foreach($roles as $role) {
            foreach($permissions as $permission) {
                DB::table('role_has_permissions')->insert([
                    'permission_id' => $permission,
                    'role_id' => $role
                ]); 
            }
        }
    }
}
