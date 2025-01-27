<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login' , [\App\Http\Controllers\UserController::class , 'Login']);
Route::middleware('auth:sanctum')->post('/logout', [\App\Http\Controllers\UserController::class, 'logout']);

Route::middleware("auth:sanctum")->group(function () {
    Route::resource('employee' , \App\Http\Controllers\EmployeeController::class);
    Route::resource('task' , \App\Http\Controllers\TaskController::class);
});
