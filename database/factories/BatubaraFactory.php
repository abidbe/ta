<?php

namespace Database\Factories;

use App\Models\DataTruk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Batubara>
 */
class BatubaraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lokasi' => $this->faker->randomElement(['Padang', 'Jambi']),
            'driver' => $this->faker->name(),
            'jumlah_retase' => $this->faker->numberBetween(1, 10),
            'jumlah_bucket' => $this->faker->numberBetween(1, 10),
            'estimasi_tonase' => $this->faker->numberBetween(1000, 100000),
            'dt_gendong' => $this->faker->randomElement(['DT1', 'DT2']),
            'tujuan' => $this->faker->randomElement(['Pabrik', 'Stockpile']),
            'data_truks_id' => DataTruk::inRandomOrder()->first(),
            'date' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
