<?php

namespace Database\Factories;

use App\Models\Athlete;
use App\Models\Sport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClassementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sports_id = Sport::all()->pluck('id');
        $athletes_id = Athlete::all()->pluck('id');
        return [
            'rang' => $this->faker->numberBetween(1,20),
            'performance' => $this->faker->paragraph,
            'sport_id' => $this->faker->randomElement($sports_id),
            'athlete_id' => $this->faker->randomElement($athletes_id),
        ];
    }
}
