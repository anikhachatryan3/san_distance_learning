<?php

namespace Tests\Feature\Models;

use App\Models\Course;
use App\Models\Subject;
use App\Models\User;
use App\Models\UserCourse;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testCourses()
    {
        $teacher = User::whereHas('roles', function($query) {
            $query->where('role', 'Teacher');
        })->firstOrFail();
        $subject = Subject::firstOrFail();
        $course1 = Course::factory()->create([
            'teacher_id' => $teacher->id,
            'subject_id' => $subject->id
        ]);
        $student = User::factory()->create();
        UserCourse::factory()->create([
            'user_id' => $student->id,
            'course_id' => $course1->id
        ]);
        $course2 = Course::factory()->create([
            'teacher_id' => $teacher->id,
            'subject_id' => $subject->id
        ]);
        UserCourse::factory()->create([
            'user_id' => $student->id,
            'course_id' => $course2->id
        ]);

        $this->assertCount(2, $student->courses);
        $this->assertInstanceOf(Course::class, $student->courses[0]);
        $this->assertInstanceOf(Course::class, $student->courses[0]);
        $this->assertEquals($course1->id, $student->courses[0]->id);
        $this->assertEquals($course2->id, $student->courses[1]->id);
    }
}
