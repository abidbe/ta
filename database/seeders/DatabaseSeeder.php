<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Batubara;
use App\Models\DataAlat;
use App\Models\DataTruk;
use App\Models\Minyak;
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
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password'=> bcrypt('password'),
            'is_admin' => true
        ]);
        User::factory()->create([
            'name' => 'Abid Ibadurrahman',
            'email' => 'abidbe.123@gmail.com',
            'password'=> bcrypt('password'),
            'is_admin' => false
        ]);
        user::factory(50)->create();

        
        // DataAlat::factory(50)->create();
        // DataTruk::factory(50)->create();
        // Minyak::factory(50)->create();
        // Batubara::factory(50)->create();
    }
}
