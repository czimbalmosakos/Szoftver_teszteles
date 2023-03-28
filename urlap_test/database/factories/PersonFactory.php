<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->lastName,
            'last_name' => $this->faker->firstName,
            'birth_date' => $this->faker->date,
            'birth_place' => $this->faker->city,
            'has_newsletter' => $this->faker->boolean,
            'introduction' => $this->faker->realText(50),
            'title' => $this->faker->title,
            'blood_type' => $this->faker->bloodType()
        ];
    }
}
