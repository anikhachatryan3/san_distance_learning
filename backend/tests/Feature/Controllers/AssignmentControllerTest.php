<?php

namespace Tests\Feature\Controllers;

use App\Http\Resources\AssignmentResource;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Tests\TestCase;

class AssignmentControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPublishAssignment()
    {
        $assignment = Assignment::factory()->create([
            'course_id' => Course::firstOrFail()->id,
            'is_published' => false
        ]);

        $this->putJson(route('assignments.publish', $assignment))->assertSuccessful();
        $assignment->refresh();

        $this->assertEquals(true, $assignment->is_published);
    }

    public function testCreateEnglish() {
        $course = Course::factory()->create([
            'subject_id' => Subject::firstOrFail()->id,
            'teacher_id' => User::firstOrFail()->id,
        ]);
        $this->postJson(route('courses.createEnglishAssignment', $course), [
            'name' => 'Assignment 1',
            'problems' => [
                [
                    'word' => 'asd',
                    'url' => 'ldek',
                ],
                [
                    'word' => 'asd',
                    'url' => 'ldek',
                ],
                [
                    'word' => 'asd',
                    'url' => 'ldek',
                ],
                [
                    'word' => 'asd',
                    'url' => 'ldek',
                ],
                [
                    'word' => 'asd',
                    'url' => 'ldek',
                ]
            ],
            'num_problems' => 5,
            'total_points' => 10,
        ])->assertSuccessful();
    }

    public function testCreateMath() {
        $course = Course::factory()->create([
            'subject_id' => Subject::firstOrFail()->id,
            'teacher_id' => User::firstOrFail()->id,
        ]);
        $this->postJson(route('courses.createMathAssignment', $course), [
            'name' => 'Assignment 1',
            'range_min' => 2,
            'operator' => '+',
            'range_max' => 75,
            'num_problems' => 5,
            'total_points' => 10,
        ])->assertSuccessful();
    }
}
