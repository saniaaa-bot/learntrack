<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Attempt;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function create()
    {
        if (Auth::user()->role !== 'instructor') {
            abort(403, 'Only instructors can create courses.');
        }
        return view('courses.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'instructor') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Course::create([
            'instructor_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard')->with('success', 'Course created successfully!');
    }

    public function show(Course $course)
    {
        $course->load('questions');
        
        // Student ke is course ke purane attempts nikaalein
        $attempts = [];
        if (Auth::user()->role === 'student') {
            $attempts = Attempt::where('user_id', Auth::id())
                                ->where('course_id', $course->id)
                                ->latest()
                                ->get();
        }

        return view('courses.show', compact('course', 'attempts'));
    }
}