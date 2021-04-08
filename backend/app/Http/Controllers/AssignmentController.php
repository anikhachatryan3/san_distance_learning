<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssignmentResource;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\EnglishProblem;
use App\Models\MathProblem;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index(Course $course, Request $request) {
        request()->validate([
            'user_id' => 'nullable|exists:users,id',
            'completed' => 'nullable|string', // 0 or 1
            'is_published' => 'nullable|string', // 0 or 1
        ]);

        $assignments = Assignment::where('course_id', $course->id);
        if($request->is_published === 1) {
            $assignments->where('is_published', true);
        }
        if($request->completed === "1") {
            $assignments->whereHas('submissions', function($query) use ($request) {
                $query->where('user_id', $request->user_id);
            });
        }
        elseif($request->completed === "0") {
            $assignments->whereDoesntHave('submissions', function($query) use ($request) {
                $query->where('user_id', $request->user_id);
            });
        }
        $assignments = $assignments->get();
        return AssignmentResource::collection($assignments);
    }

    public function publishAssignment(Assignment $assignment)
    {
        $assignment->is_published = true;
        $assignment->save();
        return new AssignmentResource($assignment);
    }

    public function show(Assignment $assignment) {
        return new AssignmentResource($assignment);
    }

    public function createMath(Course $course, Request $request) {
        $request->validate([
            'name' => 'required|string',
            'range_min' => 'required|integer',
            'operator' => 'required|in:+,-,x,X,*',
            'range_max' => 'required|integer',
            'num_problems' => 'required|integer',
        ]);

        $assignment = new Assignment;
        $assignment->course_id = $course->id;
        $assignment->name = $request->name;
        $assignment->range_min = $request->range_min;
        $assignment->range_max = $request->range_max;
        $assignment->num_problems = $request->num_problems;
        $assignment->save();

        for($i=0; $i < $assignment->num_problems; $i++) {
            $num1 = rand($assignment->range_min, $assignment->range_max);
            $num2 = rand($assignment->range_min, $assignment->range_max);
            $mathProblem = new MathProblem();
            $mathProblem->num1 = $num1;
            $mathProblem->operator = $request->operator;
            $mathProblem->num2 = $num2;
            $mathProblem->assignment_id = $assignment->id;
            $mathProblem->save();
        }

        $assignment->mathProblems;
        return new AssignmentResource($assignment);
    }

    public function createEnglish(Course $course, Request $request) {
        $request->validate([
            'name' => 'required|string',
            'problems' => 'required|array',
            'problems.*.word' => 'required|string',
            'problems.*.url' => 'required|string',
            'num_problems' => 'required|integer',
        ]);

        $assignment = new Assignment;
        $assignment->course_id = $course->id;
        $assignment->name = $request->name;
        $assignment->num_problems = $request->num_problems;
        $assignment->save();
        
        for($i=0; $i < $assignment->num_problems; $i++) {
            $englishProblem = new EnglishProblem();
            $englishProblem->assignment_id = $assignment->id;
            $englishProblem->word = $request->problems[$i]['word'];
            $englishProblem->url = $request->problems[$i]['url'];
            $englishProblem->save();
        }

        $assignment->englishProblems;
        return new AssignmentResource($assignment);
    }
}
