<?php

namespace Tests\Feature\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\User;
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

        $this->getJson(route('courses.index', $user))->dump()->assertJsonFragment(
            (new CourseResource($course))->toArray(new Request()),
        );
    }
}
