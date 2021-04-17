<?php

namespace Database\Factories;

use App\Models\Pokemon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PokemonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pokemon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'picture' => $this->faker->image(),
            'age' => $this->faker->numberBetween(1,99),
            'height' => $this->faker->numberBetween(1,99),
            'evolves_from' => $this->faker->name(),
            'evolves_to' => $this->faker->name(),
            'weakness' => $this->faker->text(16),
            'ability' => $this->faker->text(16),

        ];
    }
}
