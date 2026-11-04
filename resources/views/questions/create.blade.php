<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question - LearnTrack</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Inter', 'sans-serif'], heading: ['Outfit', 'sans-serif'] }, colors: { ed: { dark: '#0B1120', card: '#151E31', cyan: '#06B6D4' } } } }
        }
    </script>
</head>
<body class="min-h-screen bg-ed-dark font-sans text-gray-300 flex items-center justify-center p-6">

    <div class="w-full max-w-3xl bg-ed-card p-8 md:p-10 rounded-3xl border border-gray-800 shadow-2xl">
        <a href="{{ route('courses.show', $course->id) }}" class="text-ed-cyan text-sm hover:text-white mb-4 inline-block">&larr; Back to Course</a>
        
        <h2 class="text-3xl font-heading font-bold text-white mb-2">Add New Question</h2>
        <p class="text-gray-400 mb-8">Course: <span class="text-ed-cyan">{{ $course->title }}</span></p>

        @if ($errors->any())
            <div class="bg-red-900/30 text-red-400 p-4 rounded-xl mb-6 text-sm border border-red-800">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('questions.store', $course->id) }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-bold text-gray-400 mb-2">Question Text</label>
                <textarea name="question_text" rows="2" placeholder="e.g., What does HTML stand for?" class="w-full bg-ed-dark border border-gray-700 text-white p-4 rounded-xl focus:outline-none focus:border-ed-cyan transition-colors" required></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-400 mb-2">Option A</label>
                    <input type="text" name="option_a" class="w-full bg-ed-dark border border-gray-700 text-white p-3 rounded-xl focus:outline-none focus:border-ed-cyan" required>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-400 mb-2">Option B</label>
                    <input type="text" name="option_b" class="w-full bg-ed-dark border border-gray-700 text-white p-3 rounded-xl focus:outline-none focus:border-ed-cyan" required>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-400 mb-2">Option C</label>
                    <input type="text" name="option_c" class="w-full bg-ed-dark border border-gray-700 text-white p-3 rounded-xl focus:outline-none focus:border-ed-cyan" required>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-400 mb-2">Option D</label>
                    <input type="text" name="option_d" class="w-full bg-ed-dark border border-gray-700 text-white p-3 rounded-xl focus:outline-none focus:border-ed-cyan" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-400 mb-2">Correct Option</label>
                <select name="correct_option" class="w-full bg-ed-dark border border-gray-700 text-white p-3 rounded-xl focus:outline-none focus:border-ed-cyan" required>
                    <option value="A">Option A</option>
                    <option value="B">Option B</option>
                    <option value="C">Option C</option>
                    <option value="D">Option D</option>
                </select>
            </div>

            <div class="flex gap-4 pt-4 border-t border-gray-800">
                <a href="{{ route('courses.show', $course->id) }}" class="w-1/3 text-center bg-gray-800 text-white font-bold py-3 rounded-xl hover:bg-gray-700 transition-colors">Cancel</a>
                <button type="submit" class="w-2/3 bg-ed-cyan text-ed-dark font-bold py-3 rounded-xl hover:bg-white transition-all shadow-[0_0_15px_rgba(6,182,212,0.3)]">Save Question</button>
            </div>
        </form>
    </div>

</body>
</html>