<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.main');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::post('/set-student-creation', [StudentController::class, 'setStudentCreation']);
    Route::get('/get-student-details', [StudentController::class, 'getStudenDetails']);
    Route::post('/set-student-remove', [StudentController::class, 'setStudentRemove']);
    Route::put('/set-student-update', [StudentController::class, 'setStudentUpdate']);
});

require __DIR__.'/auth.php';
