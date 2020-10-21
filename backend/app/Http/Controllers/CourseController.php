<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\User;

class CourseController extends Controller
{
    // public function index(User $user)
    public function index()
    {
        $user = User::whereHas('roles', function($query) {
            $query->where('role', 'Student');
        })->firstOrFail();
        // $user = auth()->user();
        $courses = $user->courses; 
        return CourseResource::collection($courses);
    }
}
