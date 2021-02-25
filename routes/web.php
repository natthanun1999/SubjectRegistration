<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

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

// STUDENT SECTION
Route::get('/student', [StudentController::class, 'index']);

Route::get('/student/search', [StudentController::class, 'search']);
Route::post('/student/search', [StudentController::class, 'search']);

Route::get('/student/add', [StudentController::class, 'add']);
Route::post('/student/add', [StudentController::class, 'create']);

Route::get('/student/edit/{id?}', [StudentController::class, 'edit']);
Route::post('/student/edit/{id?}', [StudentController::class, 'update']);

Route::get('/student/remove/{id}', [StudentController::class, 'remove']);

// SUBJECT SECTION
Route::get('/subject', [SubjectController::class, 'index']);

Route::get('/subject/search', [SubjectController::class, 'search']);
Route::post('/subject/search', [SubjectController::class, 'search']);

Route::get('/subject/add', [SubjectController::class, 'add']);
Route::post('/subject/add', [SubjectController::class, 'create']);

Route::get('/subject/edit/{id?}', [SubjectController::class, 'edit']);
Route::post('/subject/edit/{id?}', [SubjectController::class, 'update']);

Route::get('/subject/remove/{id}', [SubjectController::class, 'remove']);