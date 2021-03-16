<?php

namespace Database\Factories;

use App\Models\MathProblem;
use Illuminate\Database\Eloquent\Factories\Factory;

class MathProblemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MathProblem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "num1" => $this->faker->numberBetween($min=1, $max=100),
            "operator" => '+',
            "num2" => $this->faker->numberBetween($min=1, $max=100),
        ];
    }
}
