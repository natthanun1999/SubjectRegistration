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
    return view('layouts.master');
});

Route::get('/student', [StudentController::class, 'index']);
Route::get('/subject', [SubjectController::class, 'index']);

Route::get('/student/search', [StudentController::class, 'search']);
Route::post('/student/search', [StudentController::class, 'search']);

Route::get('/subject/search', [SubjectController::class, 'search']);
Route::post('/subject/search', [SubjectController::class, 'search']);

Route::post('/student/edit/{id?}', [StudentController::class, 'edit']);
Route::post('/subject/edit/{id?}', [SubjectController::class, 'edit']);

Route::get('/student/remove/{id}', [StudentController::class, 'remove']);
Route::get('/subject/remove/{id}', [SubjectController::class, 'remove']);