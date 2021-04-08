<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // teacher
        $this->createTeacherUser(['first_name' => 'Litzy', 'last_name' => 'Hessel', 'email' => 'teacher@gmail.com']);

        // students
        $this->createStudentUser(['first_name' => 'Russel', 'last_name' => 'Beer', 'email' => 'russel.beer@gmail.com']);
        $this->createStudentUser(['first_name' => 'Francis', 'last_name' => 'Nolan', 'email' => 'francis.nolan@gmail.com']);
        $this->createStudentUser(['first_name' => 'Florencio', 'last_name' => 'Smitham', 'email' => 'florencio.smitham@gmail.com']);
        $this->createStudentUser(['first_name' => 'Sonia', 'last_name' => 'Haag', 'email' => 'sonia.haag@gmail.com']);
        $this->createStudentUser(['first_name' => 'Spencer', 'last_name' => 'Huels', 'email' => 'spencer.huels@gmail.com']);
    
    }

    private function createTeacherUser(array $array = []) {
        $user = User::factory()->create($array);
        $role = Role::where('role', 'Teacher')->firstOrFail();
        UserRole::factory()->create([
            'user_id' => $user->id,
            'role_id' => $role->id
        ]);
    }

    private function createStudentUser(array $array = []) {
        $user = User::factory()->create($array);
        $role = Role::where('role', 'Student')->firstOrFail();
        UserRole::factory()->create([
            'user_id' => $user->id,
            'role_id' => $role->id,
        ]);
    }
}
