<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
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
            'nome' => $this->faker->name(),
            'telefone' => $this->faker->phoneNumber(),
            'documento' => $this->faker->randomNumber(3).'.'.$this->faker->randomNumber(3).'.'.$this->faker->randomNumber(3).'-'.$this->faker->randomNumber(2), // 123.456.789-09
            'cep' => $this->faker->postcode(),
            'municipio' => $this->faker->state(),
            'rua' => $this->faker->streetAddress(),
            'complemento' => $this->faker->randomElement(['Casa', 'AP '.$this->faker->buildingNumber(), 'Apto. '.$this->faker->buildingNumber(), 'Fundos '.$this->faker->randomDigitNot(2), 'Casa '.$this->faker->randomDigitNot(2), 'Fundos']),
            'uf' => $this->faker->stateAbbr(),
        ];
    }
}
