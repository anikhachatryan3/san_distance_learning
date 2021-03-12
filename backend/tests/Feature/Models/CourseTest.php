<?php

namespace Tests\Feature\Models;

use App\Models\Course;
use App\Models\Subject;
use App\Models\User;
use App\Models\UserCourse;
use Tests\TestCase;

class CourseTest extends TestCase
{
    public function testUsers()
    {
        $teacher = User::whereHas('roles', function($query) {
            $query->where('role', 'Teacher');
        })->firstOrFail();
        $subject = Subject::firstOrFail();
        $course = Course::factory()->create([
            'teacher_id' => $teacher->id,
            'subject_id' => $subject->id
        ]);
        $student1 = User::factory()->create();
        $student2 = User::factory()->create();
        
        UserCourse::factory()->create([
            'user_id' => $student1->id,
            'course_id' => $course->id
        ]);
        UserCourse::factory()->create([
            'user_id' => $student2->id,
            'course_id' => $course->id
        ]);

        $this->assertCount(2, $course->students);
        $this->assertInstanceOf(User::class, $course->students[0]);
        $this->assertInstanceOf(User::class, $course->students[1]);
        $this->assertEquals($student1->id, $course->students[0]->id);
        $this->assertEquals($student2->id, $course->students[1]->id);

    }
    
}
