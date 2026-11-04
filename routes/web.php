<?php

use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    $courses = Course::all();
    return view('welcome', compact('courses'));
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Course Routes
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');

    // Question Routes
    Route::get('/courses/{course}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/courses/{course}/questions', [QuestionController::class, 'store'])->name('questions.store');
    
        // Quiz Attempt Route
    Route::post('/courses/{course}/attempt', [\App\Http\Controllers\AttemptController::class, 'submit'])->name('attempts.submit');
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';