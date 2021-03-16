<?php

namespace Database\Factories;

use App\Models\EnglishSubmission;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnglishSubmissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EnglishSubmission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "answer" => $this->faker->word,
        ];
    }
}
