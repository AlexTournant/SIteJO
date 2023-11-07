<?php

namespace Database\Factories;

use App\Models\Sport;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sport>
 */
class SportFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $createAt = $this->faker->dateTimeInInterval(
            $startDate = '-6 months',
            $interval = '+ 180 days',
        );
        return [
            'id' => $this->faker->randomDigitNotNull,
            'nom' => $this->faker->randomElement($array = array('Urgent', 'A Faire', 'Optionnel')),
            'description' => $this->faker->paragraph,
            'annee_ajout' => $this->faker->randomElement($array = array(true, false)),
            'nb_discipline' => $this->faker->randomDigitNotNull,
            'nb_epreuves' => $this->faker->randomDigitNotNull,
            'nb_epreuves' => $this->faker->randomDigitNotNull

        ];

    }
}
