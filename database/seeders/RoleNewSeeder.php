<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleNewSeeder extends Seeder
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
                'name' => 'Calon Siswa',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Siswa',
                'guard_name' => 'web'
            ],
        ];

        foreach ($rolesData as $roleData) {
            Role::create($roleData);
        }
    }
}
