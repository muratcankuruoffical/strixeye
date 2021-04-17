<?php

namespace Database\Factories;

use App\Models\Possessor;
use Illuminate\Database\Eloquent\Factories\Factory;

class PossessorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Possessor::class;

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
            'score' => $this->faker->numberBetween(1,999)
        ];
    }
}
