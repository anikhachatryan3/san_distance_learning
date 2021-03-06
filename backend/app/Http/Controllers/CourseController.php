<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Http\Resources\UserResource;
use App\Models\Course;
use App\Models\User;

class CourseController extends Controller
{
    public function studentCourses(User $user)
    // public function index()
    {
        // $user = User::whereHas('roles', function($query) {
        //     $query->where('role', 'Student');
        // })->firstOrFail();
        // $user = auth()->user();
        $courses = $user->courses; 
        return CourseResource::collection($courses);
    }

    public function teacherCourses(User $user)
    {
        $courses = $user->teachingCourses;
        return CourseResource::collection($courses);
    }

    public function show(Course $course)
    {
        $course->assignments;
        return new CourseResource($course);
    }

    public function students(Course $course) {
        $students = $course->students;
        return UserResource::collection($students);
    }

    public function getSubmissions(Course $course) {
        $assignments = $course->assignments;
        foreach($assignments as $assignment) {
            $assignment->submissions;
        }
        return $assignments;
    }
}
