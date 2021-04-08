<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::get('/users/{user}/student-courses', 'App\Http\Controllers\CourseController@studentCourses')->name('courses.student-courses');
Route::get('/users/{user}/teacher-courses', 'App\Http\Controllers\CourseController@teacherCourses')->name('courses.teacher-courses');
//Route::get('/courses', 'App\Http\Controllers\CourseController@index')->name('courses.index');
Route::get('/courses/{course}', 'App\Http\Controllers\CourseController@show')->name('courses.show');
Route::get('/courses/{course}/students', 'App\Http\Controllers\CourseController@students')->name('courses.students');

Route::post('/courses/{course}/english-assignment', 'App\Http\Controllers\AssignmentController@createEnglish')->name('courses.createEnglishAssignment');
Route::post('/courses/{course}/math-assignment', 'App\Http\Controllers\AssignmentController@createMath')->name('courses.createMathAssignment');

Route::get('/assignments/{assignment}', 'App\Http\Controllers\AssignmentController@show')->name('assignments.show');
Route::put('/assignments/{assignment}', 'App\Http\Controllers\AssignmentController@publishAssignment')->name('assignments.publish');
Route::post('/assignments/{assignment}/submit-math/{user}', 'App\Http\Controllers\SubmissionController@submitMathAssignment')->name('submissions.submitMath');
Route::post('/assignments/{assignment}/submit-english/{user}', 'App\Http\Controllers\SubmissionController@submitEnglishAssignment')->name('submissions.submitEnglish');
Route::get('/assignments/{assignment}/submissions', 'App\Http\Controllers\SubmissionController@index')->name('submissions.index');

Route::get('/announcements', 'App\Http\Controllers\AnnouncementController@index')->name('announcements.index');
Route::get('/announcements/{announcement}', 'App\Http\Controllers\AnnouncementController@show')->name('announcements.show');
Route::post('/announcements', 'App\Http\Controllers\AnnouncementController@createAnnouncement')->name('announcements.create');
Route::delete('/announcements/{announcement}', 'App\Http\Controllers\AnnouncementCOntroller@delete')->name('announcements.delete');
