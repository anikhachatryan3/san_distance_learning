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
            'total_points' => 'required|integer',
        ]);

        $assignment = new Assignment;
        $assignment->course_id = $course->id;
        $assignment->name = $request->name;
        $assignment->range_min = $request->range_min;
        $assignment->range_max = $request->range_max;
        $assignment->num_problems = $request->num_problems;
        $assignment->total_points = $request->total_points;
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
            'total_points' => 'required|integer',
        ]);

        $assignment = new Assignment;
        $assignment->course_id = $course->id;
        $assignment->name = $request->name;
        $assignment->num_problems = $request->num_problems;
        $assignment->total_points = $request->total_points;
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
