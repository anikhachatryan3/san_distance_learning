<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Database\Seeder;

class AssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Assignment::factory()->create([
            'name' => 'Assignment 1',
            'course_id' => Course::where('name', 'English')->firstOrFail()->id,
            'is_published' => false
        ]);
    }
}
