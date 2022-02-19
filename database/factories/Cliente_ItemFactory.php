<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Cliente_ItemFactory extends Factory
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
            'user_id' => 1,
            'cliente_id' => $this->faker->numberBetween(1, 35),
            'item_id' => $this->faker->numberBetween(1, 55),
        ];
    }
}
