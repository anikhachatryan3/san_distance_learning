<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\MathProblem;
use App\Models\MathSubmission;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Database\Seeder;

class MathAssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // math assignment
        $assignment = Assignment::factory()->create([
            'name' => 'Addition Assignment',
            'course_id' => Course::where('name', 'Math')->firstOrFail()->id,
            'num_problems' => 5,
            'total_points' => 10,
            'range_min' => 0,
            'range_max' => 100,
            'is_published' => false,
        ]);

        // questions for the math assignment
        $problem1 = MathProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'num1' => 5,
            'operator' => '+',
            'num2' => 7,
        ]);

        $problem2 = MathProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'num1' => 56,
            'operator' => '+',
            'num2' => 44,
        ]);

        $problem3 = MathProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'num1' => 17,
            'operator' => '+',
            'num2' => 32,
        ]);

        $problem4 = MathProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'num1' => 0,
            'operator' => '+',
            'num2' => 90,
        ]);

        $problem5 = MathProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'num1' => 79,
            'operator' => '+',
            'num2' => 4,
        ]);

        // student's submission
        $submission = Submission::factory()->create([
            'user_id' => User::whereHas('roles', function($query) {
                $query->where('role', 'Student');
            })->firstOrFail()->id,
            'assignment_id' => $assignment->id,
            'grade' => 1.0,
        ]);

        // student's answers to the problems
        MathSubmission::factory()->create([
            'submission_id' => $submission->id,
            'math_problem_id' => $problem1->id,
            'answer' => 12,
        ]);

        MathSubmission::factory()->create([
            'submission_id' => $submission->id,
            'math_problem_id' => $problem2->id,
            'answer' => 100,
        ]);

        MathSubmission::factory()->create([
            'submission_id' => $submission->id,
            'math_problem_id' => $problem3->id,
            'answer' => 49,
        ]);

        MathSubmission::factory()->create([
            'submission_id' => $submission->id,
            'math_problem_id' => $problem4->id,
            'answer' => 90,
        ]);

        MathSubmission::factory()->create([
            'submission_id' => $submission->id,
            'math_problem_id' => $problem5->id,
            'answer' => 83,
        ]);
    }
}
