<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::factory()->create([
            'name' => 'English'
        ]);
        Subject::factory()->create([
            'name' => 'Math'
        ]);
        Subject::factory()->create([
            'name' => 'Geography'
        ]);
        Subject::factory()->create([
            'name' => 'Science'
        ]);
        Subject::factory()->create([
            'name' => 'History'
        ]);
    }
}
