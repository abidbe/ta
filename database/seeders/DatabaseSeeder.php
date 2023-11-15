<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DataAlat;
use App\Models\DataTruk;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //user
        User::factory(10)->create();
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password'=> bcrypt('password'),
        ]);

        
        DataAlat::factory(10)->create();
        DataAlat::factory()->create([
            'name' => 'Bulldozer',
            'year' => '2010',
            'kondisi' => '90%',
            'keterangan' => 'Baik/Layak',
            'image' => 'Screenshot(763).png',
        ]);

        DataTruk::factory(10)->create();
    }
}
