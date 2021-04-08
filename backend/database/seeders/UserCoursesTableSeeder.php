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
        $student1 = $students = User::whereHas('roles', function($query) {
            $query->where('role', 'Student');
        })->where('email', 'russel.beer@gmail.com')->firstOrFail();
        $courses = Course::all();
        $courses->each(function($course) use ($student1) {
            UserCourse::factory()->create([
                'user_id' => $student1->id,
                'course_id' => $course->id
            ]);
        });

        $students = User::whereHas('roles', function($query) {
            $query->where('role', 'Student');
        })->where('email', '!=', 'russel.beer@gmail.com')->get();
        $courses = Course::whereIn('name', ['English', 'Math']);
        $students->each(function($student) use ($courses) {
            $courses->each(function($course) use ($student) {
                UserCourse::factory()->create([
                    'user_id' => $student->id,
                    'course_id' => $course->id
                ]);
            });
        });
    }
}
