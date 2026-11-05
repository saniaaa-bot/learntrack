<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }} - LearnTrack</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Inter', 'sans-serif'], heading: ['Outfit', 'sans-serif'] }, colors: { ed: { dark: '#0B1120', card: '#151E31', cyan: '#06B6D4', green: '#10B981' } } } }
        }
    </script>
</head>
<body class="min-h-screen bg-ed-dark font-sans text-gray-300 p-6 md:p-12">

    <div class="max-w-4xl mx-auto">
        <a href="{{ route('dashboard') }}" class="text-ed-cyan hover:text-white transition-colors text-sm font-bold mb-8 inline-block">&larr; Back to Dashboard</a>

        @if(session('success'))
            <div class="bg-ed-cyan/10 border border-ed-cyan text-ed-cyan px-4 py-3 rounded-xl mb-6 text-lg font-bold">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-ed-card p-8 rounded-3xl border border-gray-800 mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-3xl font-heading font-bold text-white mb-2">{{ $course->title }}</h1>
                <p class="text-gray-400">{{ $course->description }}</p>
            </div>
            @if(auth()->user()->role === 'instructor' && auth()->id() === $course->instructor_id)
                <a href="{{ route('questions.create', $course->id) }}" class="bg-ed-cyan text-ed-dark font-bold py-3 px-6 rounded-xl hover:bg-white transition-all whitespace-nowrap">
                    + Add Question
                </a>
            @endif
        </div>

        <!-- Student Previous Attempts Section -->
        @if(auth()->user()->role === 'student' && count($attempts) > 0)
            <div class="bg-ed-card p-6 rounded-3xl border border-gray-800 mb-8 border-l-4 border-l-ed-green">
                <h2 class="text-xl font-heading font-bold text-white mb-4">Your Previous Attempts</h2>
                <div class="space-y-3">
                    @foreach($attempts as $attempt)
                        <div class="flex justify-between items-center bg-ed-dark p-4 rounded-xl border border-gray-800">
                            <div>
                                <span class="text-gray-400 text-sm">Attempted on: {{ $attempt->created_at->format('M d, Y h:i A') }}</span>
                            </div>
                            <div class="text-right">
                                <span class="text-ed-green font-bold text-lg">{{ $attempt->score }} / {{ $attempt->total_questions }}</span>
                                <span class="text-gray-500 text-sm block">Score</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <h2 class="text-2xl font-heading font-bold text-white mb-6">Course Quiz</h2>
        
        @if($course->questions->count() > 0)
            <form action="{{ route('attempts.submit', $course->id) }}" method="POST">
                @csrf
                <div class="space-y-6">
                    @foreach($course->questions as $index => $question)
                        <div class="bg-ed-card p-6 rounded-2xl border border-gray-800">
                            <p class="text-white font-bold mb-4 text-lg">{{ $index + 1 }}. {{ $question->question_text }}</p>
                            
                            <div class="space-y-2">
                                @foreach(['A' => 'option_a', 'B' => 'option_b', 'C' => 'option_c', 'D' => 'option_d'] as $letter => $field)
                                    <label class="flex items-center p-3 rounded-lg bg-ed-dark border border-gray-700 cursor-pointer hover:border-ed-cyan transition-colors">
                                        <input type="radio" name="question_{{ $question->id }}" value="{{ $letter }}" class="w-5 h-5 text-ed-cyan bg-ed-dark border-gray-600 focus:ring-ed-cyan" required>
                                        <span class="ml-3 text-gray-300"><span class="font-bold">{{ $letter }})</span> {{ $question->$field }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                @if(auth()->user()->role === 'student')
                    <div class="mt-8">
                        <button type="submit" class="w-full bg-ed-cyan text-ed-dark font-bold py-4 rounded-xl hover:bg-white transition-all shadow-[0_0_15px_rgba(6,182,212,0.3)] text-lg">
                            Submit Quiz
                        </button>
                    </div>
                @else
                    <div class="mt-8 bg-yellow-900/30 border border-yellow-700 text-yellow-500 p-4 rounded-xl text-center">
                        You are logged in as an Instructor. Only students can submit this quiz.
                    </div>
                @endif
            </form>
        @else
            <div class="bg-ed-card p-8 rounded-2xl border border-gray-800 text-center text-gray-500">
                No questions have been added to this course yet.
            </div>
        @endif
    </div>

</body>
</html>