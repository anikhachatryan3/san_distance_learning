<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\MathSubmission;
use App\Models\Submission;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function submitMathAssignment(Assignment $assignment, Request $request) {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'answers' => 'required|array',
            'answers.*.answer' => 'required|integer',
            'answers.*.math_problem_id' => 'required|integer|exists:math_problems,id',
        ]);
        
        $submission = new Submission();
        $submission->user_id = $request->user_id;
        $submission->assignment_id = $assignment->id;
        $submission->save();

        $ptEach = $assignment->total_points/$assignment->num_problems;
        $points = 0;
        for($i=0; $i < count($request->answers); $i++) {
            $mathSubmission = new MathSubmission();
            $mathSubmission->submission_id = $submission->id;
            $mathSubmission->math_problem_id = $request->answers[$i]['math_problem_id'];
            $mathSubmission->answer = $request->answers[$i]['answers'];
            $mathSubmission->save();

            $mathProblem = $mathSubmission->mathProblem;
            $num1 = $mathProblem->num1;
            $op = $mathProblem->operator;
            $num2 = $mathProblem->num2;

            if($op == '+') {
                if($num1+$num2 == $mathSubmission->answer) {
                    $points += $ptEach;
                }
            }
            else if($op == '-') {
                if($num1-$num2 == $mathSubmission->answer) {
                    $points += $ptEach;
                }
            }
            if($op == 'x' || $op == 'X' || $op == '*') {
                if($num1*$num2 == $mathSubmission->answer) {
                    $points += $ptEach;
                }
            }
        }

        $grade = $points/$assignment->total_points;
        $mathSubmission->grade = $grade;
        $mathSubmission->save();
        return $mathSubmission;
    }
}
