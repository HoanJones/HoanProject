<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use ILlluminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'login'
            ],
            [
                'name' => 'create'
            ],
            [
                'name' => 'edit'
            ],
            [
                'name' => 'view'
            ],
            [
                'name' => 'comfirm'
            ],
            [
                'name' => 'delete'
            ],
            [
                'name' => 'borrow_instrument'
            ]
        ];
        Permission::insert($data);
    }
}
