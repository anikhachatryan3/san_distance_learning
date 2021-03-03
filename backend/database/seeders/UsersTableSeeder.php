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
        $this->createTeacherUser();
        for($i = 0; $i < 20; $i++) {
            $this->createStudentUser();
        }
    }

    private function createTeacherUser() {
        $user = User::factory()->create([
            'email' => 'teacher@gmail.com'
        ]);
        $role = Role::where('role', 'Teacher')->firstOrFail();
        UserRole::factory()->create([
            'user_id' => $user->id,
            'role_id' => $role->id
        ]);
    }

    private function createStudentUser() {
        $user = User::factory()->create();
        $role = Role::where('role', 'Student')->firstOrFail();
        UserRole::factory()->create([
            'user_id' => $user->id,
            'role_id' => $role->id,
        ]);
    }
}
