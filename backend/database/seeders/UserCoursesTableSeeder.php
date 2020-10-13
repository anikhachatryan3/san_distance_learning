<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Database\Seeder;

class UserCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = User::whereHas('roles', function($query) {
            $query->where('role', 'Student');
        })->firstOrFail();
        $courses = Course::all();
        $courses->each(function($course) use ($student) {
            UserCourse::factory()->create([
                'user_id' => $student->id,
                'course_id' => $course->id
            ]);
        });
    }
}
