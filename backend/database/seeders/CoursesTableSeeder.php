<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = User::whereHas('roles', function($query) {
            $query->where('role', 'Teacher');
        })->firstOrFail();

        Course::factory()->create([
            'name' => 'English',
            'subject_id' => Subject::where('name','English')->firstOrFail()->id,
            'teacher_id' => $teacher->id,
        ]);
        Course::factory()->create([
            'name' => 'Math',
            'subject_id' => Subject::where('name','Math')->firstOrFail()->id,
            'teacher_id' => $teacher->id,
        ]);
        Course::factory()->create([
            'name' => 'Geography',
            'subject_id' => Subject::where('name','Geography')->firstOrFail()->id,
            'teacher_id' => $teacher->id,
        ]);
        Course::factory()->create([
            'name' => 'Science',
            'subject_id' => Subject::where('name','Science')->firstOrFail()->id,
            'teacher_id' => $teacher->id,
        ]);
    }

}
