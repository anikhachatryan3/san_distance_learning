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
// Route::get('/users/{user}/courses', 'App\Http\Controllers\CourseController@index')->name('courses.index');
Route::get('/courses', 'App\Http\Controllers\CourseController@index')->name('courses.index');

Route::get('/assignments/{assignment}', 'App\Http\Controllers\AssignmentController@show')->name('assignments.show');
Route::put('/assignments/{assignment}', 'App\Http\Controllers\AssignmentController@publishAssignment')->name('assignments.publish');
