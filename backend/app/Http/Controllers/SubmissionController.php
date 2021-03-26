<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\MathSubmission;
use App\Models\EnglishSubmission;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index(Assignment $assignment) {
        $assignment->submissions->each(function($submission) {
            $submission->mathSubmissions;
            $submission->englishSubmissions;
        });
        return $assignment->submissions;
    }

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

        $points = 0;
        for($i=0; $i < count($request->answers); $i++) {
            $mathSubmission = new MathSubmission();
            $mathSubmission->submission_id = $submission->id;
            $mathSubmission->math_problem_id = $request->answers[$i]['math_problem_id'];
            $mathSubmission->answer = $request->answers[$i]['answer'];
            $mathSubmission->save();

            $mathProblem = $mathSubmission->mathProblem;
            $num1 = $mathProblem->num1;
            $op = $mathProblem->operator;
            $num2 = $mathProblem->num2;

            if($op == '+') {
                if($num1+$num2 == $mathSubmission->answer) {
                    $points += 1;
                }
            }
            else if($op == '-') {
                if($num1-$num2 == $mathSubmission->answer) {
                    $points += 1;
                }
            }
            if($op == 'x' || $op == 'X' || $op == '*') {
                if($num1*$num2 == $mathSubmission->answer) {
                    $points += 1;
                }
            }
        }

        $grade = $points/$assignment->num_problems;
        $submission->grade = $grade;
        $submission->save();
        return $submission;
    }

    public function submitEnglishAssignment(Assignment $assignment, Request $request) {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'answers' => 'required|array',
            'answers.*.answer' => 'required|string',
            'answers.*.english_problem_id' => 'required|integer|exists:english_problems,id',
        ]);

        $submission = new Submission();
        $submission->user_id = $request->user_id;
        $submission->assignment_id = $assignment->id;
        $submission->save();

        $points = 0;

        for($i=0; $i < count($request->answers); $i++) {
            $englishSubmission = new EnglishSubmission();
            $englishSubmission->submission_id = $submission->id;
            $englishSubmission->english_problem_id = $request->answers[$i]['english_problem_id'];
            $englishSubmission->answer = $request->answers[$i]['answer'];
            $englishSubmission->save();

            $englishProblem = $englishSubmission->englishProblem;
            $word = $englishProblem->word;

            if($word == $englishSubmission->answer) {
                $points += 1;
            }
        }

        $grade = $points/$assignment->num_problems;
        $submission->grade = $grade;
        $submission->save();
        return $submission;
    }
}
