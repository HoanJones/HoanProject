<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use ILlluminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin'
            ],
            [
                'name' => 'Member'
            ],
            [
                'name' => 'Ex_Member'
            ]
        ];
        Role::insert($data);
    }
}
