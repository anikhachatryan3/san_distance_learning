<?php

namespace Database\Factories;

use App\Models\EnglishProblem;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnglishProblemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EnglishProblem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "word" => $this->faker->word,
            "url" => $this->faker->imageUrl($width=640, $height=480, 'animals'),
        ];
    }
}
