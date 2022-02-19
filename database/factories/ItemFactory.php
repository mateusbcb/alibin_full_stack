<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function withFaker()
    {
        return \Faker\Factory::create('pt_BR');
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word(),
            'preco' => $this->faker->randomFloat(2),
            'codigo' => $this->faker->ean13(),
        ];
    }
}
