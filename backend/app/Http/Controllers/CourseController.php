<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\User;

class CourseController extends Controller
{
    public function index(User $user)
    {
        // $user = auth()->user();
        $courses = $user->courses;
        return CourseResource::collection($courses);
    }
}
