<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(UserCoursesTableSeeder::class);
        $this->call(EnglishAssignmentsTableSeeder::class);
        $this->call(MathAssignmentsTableSeeder::class);
    }
}
