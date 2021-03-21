<?php

namespace Tests\Feature\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\EnglishProblem;
use App\Models\MathProblem;
use App\Models\User;
use Tests\TestCase;

class SubmissionControllerTest extends TestCase {

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testSubmitMathAssignment() {
        $assignment = Assignment::factory()->create([
            'course_id' => Course::firstOrFail()->id,
            'num_problems' => 5,
        ]);

        $mathProblem1 = MathProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'num1' => 52,
            'operator' => '+',
            'num2' => 67,
        ]);

        $mathProblem2 = MathProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'num1' => 14,
            'operator' => '-',
            'num2' => 8,
        ]);

        $mathProblem3 = MathProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'num1' => 27,
            'operator' => '+',
            'num2' => 43,
        ]);

        $mathProblem4 = MathProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'num1' => 80,
            'operator' => '-',
            'num2' => 70,
        ]);
    
        $mathProblem5 = MathProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'num1' => 20,
            'operator' => 'x',
            'num2' => 10,
        ]);

        $this->postJson(route('submissions.submitMath', $assignment), [
            'user_id' => User::firstOrFail()->id,
            'answers' => [
                [
                    'answer' => 119,
                    'math_problem_id' => $mathProblem1->id,
                ],
                [
                    'answer' => 6,
                    'math_problem_id' => $mathProblem2->id,
                ],
                [
                    'answer' => 70,
                    'math_problem_id' => $mathProblem3->id,
                ],
                [
                    'answer' => 11,
                    'math_problem_id' => $mathProblem4->id,
                ],
                [
                    'answer' => 200,
                    'math_problem_id' => $mathProblem5->id,
                ]
            ]
        ])->assertSuccessful()
        ->assertJsonFragment([
            'grade' => 0.8,
            'assignment_id' => $assignment->id,
        ]);
    }

    public function testSubmitEnglishAssignment() {

        $assignment = Assignment::factory()->create([
            'course_id' => Course::firstOrFail()->id,
            'num_problems' => 5,
        ]);

        $englishProblem1 = EnglishProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'word' => 'cat',
            'url' => 'url'
        ]);

        $englishProblem2 = EnglishProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'word' => 'dog',
            'url' => 'url'
        ]);

        $englishProblem3 = EnglishProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'word' => 'ferret',
            'url' => 'url'
        ]);

        $englishProblem4 = EnglishProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'word' => 'turtle',
            'url' => 'url'
        ]);

        $englishProblem5 = EnglishProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'word' => 'pig',
            'url' => 'url'
        ]);

        $this->postJson(route('submissions.submitEnglish', $assignment), [
            'user_id' => User::firstOrFail()->id,
            'answers' => [
                [
                    'answer' => 'cat',
                    'english_problem_id' => $englishProblem1->id,
                ],
                [
                    'answer' => 'dog',
                    'english_problem_id' => $englishProblem2->id,
                ],
                [
                    'answer' => 'chicken',
                    'english_problem_id' => $englishProblem3->id,
                ],
                [
                    'answer' => 'turtle',
                    'english_problem_id' => $englishProblem4->id,
                ],
                [
                    'answer' => 'pig',
                    'english_problem_id' => $englishProblem5->id,
                ]
            ]
        ])->assertSuccessful()
        ->assertJsonFragment([
            'grade' => 0.8,
            'assignment_id' => $assignment->id,
        ]);
    }
}
