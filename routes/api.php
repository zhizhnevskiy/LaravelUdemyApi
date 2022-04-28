<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentsClassController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\StudentController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// Students classes routers
Route::get('/class', [StudentsClassController::class, 'Index']);
Route::post('/class/store', [StudentsClassController::class, 'Store']);
Route::get('/class/edit/{id}', [StudentsClassController::class, 'Edit']);
Route::post('/class/update/{id}', [StudentsClassController::class, 'Update']);
Route::get('/class/delete/{id}', [StudentsClassController::class, 'Delete']);

// Subject classes routers
Route::get('/subject', [SubjectController::class, 'Index']);
Route::post('/subject/store', [SubjectController::class, 'Store']);
Route::get('/subject/edit/{id}', [SubjectController::class, 'Edit']);
Route::post('/subject/update/{id}', [SubjectController::class, 'Update']);
Route::get('/subject/delete/{id}', [SubjectController::class, 'Delete']);

// Section classes routers
Route::get('/section', [SectionController::class, 'Index']);
Route::post('/section/store', [SectionController::class, 'Store']);
Route::get('/section/edit/{id}', [SectionController::class, 'Edit']);
Route::post('/section/update/{id}', [SectionController::class, 'Update']);
Route::get('/section/delete/{id}', [SectionController::class, 'Delete']);

// Students classes routers
Route::get('/student', [StudentController::class, 'Index']);
Route::post('/student/store', [StudentController::class, 'Store']);
Route::get('/student/edit/{id}', [StudentController::class, 'Edit']);
Route::post('/student/update/{id}', [StudentController::class, 'Update']);
Route::get('/student/delete/{id}', [StudentController::class, 'Delete']);
