<?php

namespace Tests\Feature\Controllers;

use App\Http\Resources\AssignmentResource;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\Request;
use Tests\TestCase;

class AssignmentControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    // public function testAssignmentsGetsAll() {
    //     $user = User::firstOrFail();
    //     $course = Course::factory()->create([
    //         'subject_id' => Subject::firstOrFail()->id,
    //         'teacher_id' => User::firstOrFail()->id,
    //     ]);

    //     $assignment1 = Assignment::factory()->create([
    //         'course_id' => $course->id,
    //     ]);
    //     $assignment2 = Assignment::factory()->create([
    //         'course_id' => $course->id,
    //     ]);
    //     $submission = Submission::factory()->create([
    //         'assignment_id' => $assignment1->id,
    //         'user_id' => $user->id,
    //     ]);
    //     $course->refresh();

    //     dump($assignment1->id, $assignment2->id);
    //     $this->getJson(route('courses.show', $course))->dump()->assertJsonFragment(
    //         (new AssignmentResource($assignment1))->toArray(new Request()),
    //         (new AssignmentResource($assignment2))->toArray(new Request()),
    //     );
    // }

    public function testAssignmentsCompleted() {
        $user = User::firstOrFail();
        $course = Course::factory()->create([
            'subject_id' => Subject::firstOrFail()->id,
            'teacher_id' => User::firstOrFail()->id,
        ]);

        $assignment1 = Assignment::factory()->create([
            'course_id' => $course->id,
            'is_published' => true,
        ]);
        $assignment2 = Assignment::factory()->create([
            'course_id' => $course->id,
            'is_published' => true,
        ]);
        $submission = Submission::factory()->create([
            'assignment_id' => $assignment1->id,
            'user_id' => $user->id,
        ]);
        $course->refresh();
        dump($assignment1->id, $assignment2->id);

        // completed = null
        $this->getJson(route('courses.assignments.index', [
            'course' => $course,
            'user_id' => $user->id,
        ]))->dump();
        // ->assertJsonFragment(
        //     (new AssignmentResource($assignment1))->toArray(new Request()),
        // )->assertJsonFragment(
        //     (new AssignmentResource($assignment2))->toArray(new Request()),
        // );

        // completed = 1
        $this->getJson(route('courses.assignments.index', [
            'course' => $course,
            'user_id' => $user->id,
            'completed' => "1",
        ]))->dump();
        // ->assertJsonFragment(
        //     (new AssignmentResource($assignment1))->toArray(new Request()),
        // );

        // completed = 0
        $this->getJson(route('courses.assignments.index', [
            'course' => $course,
            'user_id' => $user->id,
            'completed' => "0"
        ]))->dump();
    //     ->assertJsonFragment(
    //         (new AssignmentResource($assignment2))->toArray(new Request()),
    //     );
    }

    // public function testAssignmentsNotCompleted() {
    //     $user = User::firstOrFail();
    //     $course = Course::factory()->create([
    //         'subject_id' => Subject::firstOrFail()->id,
    //         'teacher_id' => User::firstOrFail()->id,
    //     ]);

    //     $assignment1 = Assignment::factory()->create([
    //         'course_id' => $course->id,
    //     ]);
    //     $assignment2 = Assignment::factory()->create([
    //         'course_id' => $course->id,
    //     ]);
    //     $submission = Submission::factory()->create([
    //         'assignment_id' => $assignment1->id,
    //         'user_id' => $user->id,
    //     ]);
    //     $course->refresh();

    //     dump($assignment1->id, $assignment2->id);
    //     $this->getJson(route('courses.show', [
    //         'course' => $course,
    //         'user_id' => $user->id,
    //         'completed' => 0,
    //     ]))->dump()->assertJsonFragment(
    //         (new AssignmentResource($assignment2))->toArray(new Request()),
    //     );
    // }

    // /**
    //  * A basic test example.
    //  *
    //  * @return void
    //  */
    // public function testPublishAssignment()
    // {
    //     $assignment = Assignment::factory()->create([
    //         'course_id' => Course::firstOrFail()->id,
    //         'is_published' => false
    //     ]);

    //     $this->putJson(route('assignments.publish', $assignment))->assertSuccessful();
    //     $assignment->refresh();

    //     $this->assertEquals(true, $assignment->is_published);
    // }

    // public function testCreateEnglish() {
    //     $course = Course::factory()->create([
    //         'subject_id' => Subject::firstOrFail()->id,
    //         'teacher_id' => User::firstOrFail()->id,
    //     ]);
    //     $this->postJson(route('courses.createEnglishAssignment', $course), [
    //         'name' => 'Assignment 1',
    //         'problems' => [
    //             [
    //                 'word' => 'asd',
    //                 'url' => 'ldek',
    //             ],
    //             [
    //                 'word' => 'asd',
    //                 'url' => 'ldek',
    //             ],
    //             [
    //                 'word' => 'asd',
    //                 'url' => 'ldek',
    //             ],
    //             [
    //                 'word' => 'asd',
    //                 'url' => 'ldek',
    //             ],
    //             [
    //                 'word' => 'asd',
    //                 'url' => 'ldek',
    //             ]
    //         ],
    //         'num_problems' => 5,
    //     ])->assertSuccessful();
    // }

    // public function testCreateMath() {
    //     $course = Course::factory()->create([
    //         'subject_id' => Subject::firstOrFail()->id,
    //         'teacher_id' => User::firstOrFail()->id,
    //     ]);
    //     $this->postJson(route('courses.createMathAssignment', $course), [
    //         'name' => 'Assignment 1',
    //         'range_min' => 2,
    //         'operator' => '+',
    //         'range_max' => 75,
    //         'num_problems' => 5,
    //     ])->assertSuccessful();
    // }
}
