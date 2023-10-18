<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ville;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ville = Ville::inRandomOrder()->first();
        return [
            "nom"=> $this->faker->name,
            "adresse" => $this->faker->address,
            "phone" => $this->faker->phoneNumber,
            "email" => $this->faker->email,
            "date_de_naissance" => $this->faker->dateTimeBetween('-65 years', '-15 years')->format('Y-m-d'),
            // "ville_id" => Ville::factory()
            "ville_id" => $ville->id
           

        ];
    }
}
