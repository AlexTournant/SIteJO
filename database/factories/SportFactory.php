<?php

namespace Database\Factories;

use App\Models\Sport;
use App\Models\User;
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
        $users_id = User::all()->pluck('id');
        return [
            'nom' => $this->faker->randomElement($array = array('Foot', 'Patinage artistique', 'golf','natation')),
            'description' => $this->faker->paragraph,
            'annee_ajout' => $this->faker->date('Y'),
            'nb_disciplines' => $this->faker->randomDigitNotNull,
            'nb_epreuves' => $this->faker->randomDigitNotNull,
            'date_debut' => $this->faker->date(),
            'date_fin' => $this->faker->date(),
            'user_id' => $this->faker->randomElement($users_id),
        ];

    }
}
