<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataAlat>
 */
class DataAlatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucfirst(fake()->word()),
            'year' => fake()->numberBetween(2000,2024),
            'kondisi' => fake()->numberBetween(0, 100).'%',
            'keterangan' => fake()->randomElement(array('Baik','Cukup','Buruk')),
            'image' => 'Screenshot(763).png',
            
        ];
    }
}
