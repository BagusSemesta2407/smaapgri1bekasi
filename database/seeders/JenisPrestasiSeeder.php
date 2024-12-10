<?php

namespace Database\Seeders;

use App\Models\JenisPrestasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisPrestasi::created([
            'name' => 'Kesenian',
        ]);
        JenisPrestasi::created([
            'name' => 'Olahraga',
        ]);
        JenisPrestasi::created([
            'name' => 'Kemasyarakatan/Organisasi',
        ]);
        JenisPrestasi::created([
            'name' => 'Hasta/Karya',
        ]);
        JenisPrestasi::created([
            'name' => 'Lainnya',
        ]);
    }
}
