<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentsClassController;
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

Route::get('/class', [StudentsClassController::class, 'Index']);
Route::post('/class/store', [StudentsClassController::class, 'Store']);
Route::get('/class/edit/{id}', [StudentsClassController::class, 'Edit']);
Route::post('/class/update/{id}', [StudentsClassController::class, 'Update']);
Route::get('/class/delete/{id}', [StudentsClassController::class, 'Delete']);
