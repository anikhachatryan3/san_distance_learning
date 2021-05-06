<?php

namespace Tests\Feature\Controllers;

use App\Http\Resources\AssignmentResource;
use App\Http\Resources\CourseResource;
use App\Http\Resources\UserResource;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Submission;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Tests\TestCase;

class CourseControllerTest extends TestCase
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
    public function testStudentCourses()
    {
        $user = User::factory()->create();
        $course = Course::factory()->create([
            'subject_id' => Subject::firstOrFail()->id,
            'teacher_id' => User::firstOrFail()->id,
        ]);
        UserCourse::factory()->create([
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);

        $this->getJson(route('courses.student-courses', $user))->assertJsonFragment(
            (new CourseResource($course))->toArray(new Request()),
        );
    }

    public function testTeacherCourses()
    {
        $user = User::factory()->create();
        $course1 = Course::factory()->create([
            'subject_id' => Subject::firstOrFail()->id,
            'teacher_id' => $user->id,
        ]);
        $course2 = Course::factory()->create([
            'subject_id' => Subject::firstOrFail()->id,
            'teacher_id' => $user->id,
        ]);

        $this->getJson(route('courses.teacher-courses', $user))
            ->assertJsonFragment(
                (new CourseResource($course1))->toArray(new Request()),
            )->assertJsonFragment(
                (new CourseResource($course2))->toArray(new Request()),
            );
    }

    public function show() {
        $course = Course::factory()->create([
            'subject_id' => Subject::firstOrFail()->id,
            'teacher_id' => User::firstOrFail()->id,
        ]);

        $this->getJson(route('courses.show', $course))->assertJsonFragment(
            (new CourseResource($course))->toArray(new Request()),
        );
    }

    public function testStudents() {
        $teacher = User::whereHas('roles', function($query) {
            $query->where('role', 'Teacher');
        })->firstOrFail();
        $course = Course::factory()->create([
            'teacher_id' => $teacher->id,
            'subject_id' => Subject::firstOrFail()->id,
        ]);
        $student = User::whereHas('roles', function($query) {
            $query->where('role', 'Student');
        })->firstOrFail();
        UserCourse::factory()->create([
            'user_id' => $student->id,
            'course_id' => $course->id
        ]);

        $this->getJson(route('courses.students', [
            'course' => $course->id,
        ]))->assertJsonFragment(
            (new UserResource($student))->toArray(new Request()),
        );
    }

    public function testGetSubmissions() {
        $course = Course::factory()->create([
            'subject_id' => Subject::firstOrFail()->id,
            'teacher_id' => User::firstOrFail()->id,
        ]);

        $assignment1 = Assignment::factory()->create([
            'course_id' => $course->id,
        ]);

        $assignment2 = Assignment::factory()->create([
            'course_id' => $course->id,
        ]);

        $submission1 = Submission::factory()->create([
            'assignment_id' => $assignment1->id,
            'user_id' => User::firstOrFail()->id,
        ]);

        $submission2 = Submission::factory()->create([
            'assignment_id' => $assignment2->id,
            'user_id' => User::firstOrFail()->id,
        ]);

        $this->getJson(route('courses.submissions', [
            'course' => $course->id,
        ]))->assertJsonFragment(
            $assignment1->toArray(),
        )->assertJsonFragment(
            $assignment2->toArray(),
        )->assertJsonFragment(
            $submission1->toArray(),
        )->assertJsonFragment(
            $submission2->toArray(),
        );
    }
}
