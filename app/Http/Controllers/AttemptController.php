<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Attempt;
use Illuminate\Support\Facades\Auth;

class AttemptController extends Controller
{
    public function submit(Request $request, Course $course)
    {
        if (Auth::user()->role !== 'student') {
            abort(403, 'Only students can take quizzes.');
        }

        $questions = $course->questions;
        $score = 0;

        // Har question ka answer check karein
        foreach ($questions as $question) {
            $studentAnswer = $request->input('question_' . $question->id);
            
            // Agar student ka answer correct answer se match karta hai toh score barhayein
            if ($studentAnswer === $question->correct_option) {
                $score++;
            }
        }

        // Database mein result save karein
        Attempt::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
            'score' => $score,
            'total_questions' => $questions->count(),
        ]);

        return redirect()->route('courses.show', $course->id)->with('success', "Quiz submitted! Your score: $score / " . $questions->count());
    }
}