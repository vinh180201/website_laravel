<?php

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

Route::get('/hello', [\App\Http\Controllers\HelloController::class, 'hello']);

//users
Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']);
Route::put('/users/{id}', [\App\Http\Controllers\UserController::class, 'update']);
Route::delete('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);

Route::get('/view', [\App\Http\Controllers\ViewController::class, 'view']);


//test header request
Route::get('/auth', [\App\Http\Controllers\AuthController::class, 'index']);
Route::group(['middleware' => 'auth_anthinhphatjsc'], function() {
    Route::post('/auth', [\App\Http\Controllers\AuthController::class, 'upload']);
});

//student
Route::get('/student', [\App\Http\Controllers\StudentController::class, 'index']);
Route::get('/student/edit/{id}', [\App\Http\Controllers\StudentController::class, 'edit']);
Route::get('/student/add', [\App\Http\Controllers\StudentController::class, 'create']);
Route::post('/student', [\App\Http\Controllers\StudentController::class, 'store']);
Route::put('/student/{id}', [\App\Http\Controllers\StudentController::class, 'update']);
Route::delete('/student/{id}', [\App\Http\Controllers\StudentController::class, 'destroy']);
Route::get('/student/search', [\App\Http\Controllers\StudentController::class, 'find']);

//test
Route::get('/test', function () {
    return view('pages.index');
});
