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
            'name' => 'English',
            'bg_variant' => 'light',
            'img_src' => 'https://static-s.aa-cdn.net/img/ios/415071093/bcac7393903dd60ebd9966a8ebab3bde?v=1'
        ]);
        Subject::factory()->create([
            'name' => 'Math',
            'bg_variant' => 'warning',
            'img_src' => 'https://is5-ssl.mzstatic.com/image/thumb/Purple114/v4/78/5d/f0/785df065-7d09-1089-f370-5854fc212be9/source/512x512bb.jpg'
        ]);
        Subject::factory()->create([
            'name' => 'Geography',
            'bg_variant' => 'success',
            'img_src' => 'https://static-s.aa-cdn.net/img/ios/1128664538/1cd597aeec91e594017d1e3862b84b34?v=1'
        ]);
        Subject::factory()->create([
            'name' => 'Science',
            'bg_variant' => 'danger',
            'img_src' => 'https://is2-ssl.mzstatic.com/image/thumb/Purple114/v4/12/88/fd/1288fd57-a0c9-e325-e793-bbad8e557ee6/source/256x256bb.jpg'
        ]);
    }
}
