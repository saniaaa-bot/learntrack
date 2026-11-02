<?php

use Illuminate\Support\Facades\Route;
use App\Models\Course;

Route::get('/', function () {
    $courses = Course::all();
    return view('welcome', compact('courses'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';