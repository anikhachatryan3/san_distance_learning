<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\EnglishProblem;
use App\Models\EnglishSubmission;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Database\Seeder;

class EnglishAssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // english assignment
        $assignment = Assignment::factory()->create([
            'name' => 'Animals Assignment',
            'course_id' => Course::where('name', 'English')->firstOrFail()->id,
            'num_problems' => 5,
            'is_published' => false,
        ]);

        // questions for the english assignment
        $problem1 = EnglishProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'word' => 'cat',
            'url' => 'https://static.scientificamerican.com/sciam/cache/file/92E141F8-36E4-4331-BB2EE42AC8674DD3_source.jpg',
        ]);

        $problem2 = EnglishProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'word' => 'dog',
            'url' => 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/dog-puppy-on-garden-royalty-free-image-1586966191.jpg?crop=1.00xw:0.669xh;0,0.190xh&resize=1200:*',
        ]);

        $problem3 = EnglishProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'word' => 'turtle',
            'url' => 'https://thumbs-prod.si-cdn.com/Fd5JxEOpW-mu_FKIJFFG0u0KJF8=/fit-in/1072x0/https://public-media.si-cdn.com/filer/ee/c7/eec7622a-b164-4a47-a01f-a21f8ef94234/turtletop.jpg',
        ]);

        $problem4 = EnglishProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'word' => 'lion',
            'url' => 'https://www.goway.com/media/cache/aa/79/aa79264f49aae4d4b2d77f0abdeb16fc.jpg',
        ]);

        $problem5 = EnglishProblem::factory()->create([
            'assignment_id' => $assignment->id,
            'word' => 'giraffe',
            'url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Giraffe_Mikumi_National_Park.jpg/1200px-Giraffe_Mikumi_National_Park.jpg',
        ]);

        // student's submission
        $submission = Submission::factory()->create([
            'user_id' => User::whereHas('roles', function($query) {
                $query->where('role', 'Student');
            })->firstOrFail()->id,
            'assignment_id' => $assignment->id,
            'grade' => 0.8,
        ]);

        // student's answers to the problems
        EnglishSubmission::factory()->create([
            'submission_id' => $submission->id,
            'english_problem_id' => $problem1->id,
            'answer' => 'cat',
        ]);

        EnglishSubmission::factory()->create([
            'submission_id' => $submission->id,
            'english_problem_id' => $problem2->id,
            'answer' => 'dog',
        ]);

        EnglishSubmission::factory()->create([
            'submission_id' => $submission->id,
            'english_problem_id' => $problem3->id,
            'answer' => 'lion',
        ]);

        EnglishSubmission::factory()->create([
            'submission_id' => $submission->id,
            'english_problem_id' => $problem4->id,
            'answer' => 'mouse',
        ]);

        EnglishSubmission::factory()->create([
            'submission_id' => $submission->id,
            'english_problem_id' => $problem5->id,
            'answer' => 'giraffe',
        ]);
    }
}
