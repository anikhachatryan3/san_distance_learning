<?php

namespace Tests\Feature\Controllers;

use App\Models\Assignment;
use App\Models\Course;
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
            'total_points' => 5,
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

        $this->postJson(route('submissions.submit', $assignment), [
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
}
