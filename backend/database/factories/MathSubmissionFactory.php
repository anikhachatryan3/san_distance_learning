<?php

namespace Database\Factories;

use App\Models\MathSubmission;
use Illuminate\Database\Eloquent\Factories\Factory;

class MathSubmissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MathSubmission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "answer" => $this->faker->numberBetween($min=2, $max=200),
        ];
    }
}
