<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'      => 'Admin',
<<<<<<< HEAD
            'nip'       => '12345',
=======
            'nip'       => '123456',
>>>>>>> 4fe53655c39d9e34aaf6d1792e2f40e132cce24f
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('123456')
        ]);
    }
}
