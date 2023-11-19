<?php

namespace Database\Factories;

use App\Models\DataAlat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Minyak>
 */
class MinyakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['Pemasukan', 'Pengeluaran']),
            'data_alats_id' => DataAlat::inRandomOrder()->first(),
            'amount' => $this->faker->numberBetween(1000, 100000),
            'keterangan' => $this->faker->sentence(5),
            'date'=>$this->faker->dateTimeBetween('-1 years', 'now')

        ];
    }
}
