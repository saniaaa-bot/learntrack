<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function create(Course $course)
    {
        if (Auth::user()->role !== 'instructor' || $course->instructor_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('questions.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        if (Auth::user()->role !== 'instructor' || $course->instructor_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'question_text' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_option' => 'required|in:A,B,C,D',
        ]);

        $course->questions()->create([
            'question_text' => $request->question_text,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'correct_option' => $request->correct_option,
        ]);

        return redirect()->route('courses.show', $course->id)->with('success', 'Question added successfully!');
    }
}