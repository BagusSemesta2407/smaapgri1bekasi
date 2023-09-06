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
        $rolesData = [
            [
                'name' => 'admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'guru',
                'guard_name' => 'web'
            ],
            [
                'name' => 'pembina',
                'guard_name' => 'web'
            ],
        ];
    
        foreach ($rolesData as $roleData) {
            Role::create($roleData);
        }
    }
}
