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
            'nip'       => '123456',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('123456')
        ]);

        $admin->assignRole('admin');

        $pembina = User::create([
            'name'      => 'Pembina',
            'nip'       => '12345',
            'email'     => 'pembina@gmail.com',
            'password'  => bcrypt('123456')
        ]);

        $pembina->assignRole('pembina');

        $guru = User::create([
            'name'      => 'Guru',
            'nip'       => '1234',
            'email'     => 'guru@gmail.com',
            'password'  => bcrypt('123456')
        ]);

        $guru->assignRole('guru');
    }
}
