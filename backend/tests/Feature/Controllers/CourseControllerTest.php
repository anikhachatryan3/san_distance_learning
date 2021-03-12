<?php

namespace Tests\Feature\Controllers;

use App\Http\Resources\CourseResource;
use App\Http\Resources\UserResource;
use App\Models\Course;
use App\Models\Subject;
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
    public function testIndex()
    {
        $user = User::whereHas('roles', function($query) {
            $query->where('role', 'Student');
        })->firstOrFail();
        $course = Course::firstOrFail();

        $this->getJson(route('courses.index', $user))->assertJsonFragment(
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
}
