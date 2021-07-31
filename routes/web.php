<?php

use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('subject', SubjectController::class);
Route::resource('classRoom', ClassRoomController::class);
Route::resource('student', StudentController::class);
Route::resource('exam', ExamController::class);
Route::resource('question', QuestionController::class);


//public
Route::get("student/find/{exam}", [StudentController::class, 'findView']);
Route::post("student/find", [StudentController::class, 'find'])->name("student.exam.find");
