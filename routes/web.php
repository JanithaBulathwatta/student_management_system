<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
});


Route::post('set-student-creation',[StudentController::class,'setStudentCreation']);
Route::get('get-student-details',[StudentController::class,'getStudenDetails']);
Route::post('set-student-remove',[StudentController::class,'setStudentRemove']);
Route::put('set-student-update',[StudentController::class,'setStudentUpdate']);
