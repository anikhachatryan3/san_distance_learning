<?php

namespace Database\Factories;

use App\Models\Assignment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Assignment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'num_problems' => $this->faker->numberBetween(1, 50),
            'total_points' => $this->faker->numberBetween(1, 100),
            'is_published' => $this->faker->boolean,
        ];
    }
}
