<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - LearnTrack</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Inter', 'sans-serif'], heading: ['Outfit', 'sans-serif'] }, colors: { ed: { dark: '#0B1120', card: '#151E31', cyan: '#06B6D4' } } } }
        }
    </script>
</head>
<body class="min-h-screen bg-ed-dark font-sans text-gray-300">
    <nav class="w-full border-b border-gray-800 bg-ed-dark py-4">
        <div class="max-w-6xl mx-auto px-6 flex justify-between items-center">
            <h1 class="text-2xl font-heading font-extrabold text-white tracking-tight">LearnTrack.</h1>
            <div class="flex items-center gap-6">
                <a href="/" class="text-sm font-medium hover:text-ed-cyan transition-colors">Home</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm font-medium text-red-400 hover:text-red-300">Log Out</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-12">
        @if(session('success'))
            <div class="bg-ed-cyan/10 border border-ed-cyan text-ed-cyan px-4 py-3 rounded-xl mb-8 shadow-[0_0_15px_rgba(6,182,212,0.2)]">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6 bg-ed-card p-8 rounded-3xl border border-gray-800 shadow-2xl relative overflow-hidden">
            <div class="relative z-10">
                <h2 class="text-3xl font-heading font-bold text-white mb-2">
                    @if(auth()->user()->role === 'instructor') Instructor Panel @else Student Panel @endif
                </h2>
                <p class="text-gray-400">Welcome back, <span class="text-ed-cyan font-bold">{{ auth()->user()->name }}</span>.</p>
            </div>
            
            @if(auth()->user()->role === 'instructor')
                <a href="{{ route('courses.create') }}" class="relative z-10 bg-ed-cyan text-ed-dark font-bold py-3 px-6 rounded-xl hover:bg-white transition-all shadow-[0_0_15px_rgba(6,182,212,0.4)] hover:-translate-y-0.5">
                    + Create Course
                </a>
            @endif
        </div>

        <h3 class="text-2xl font-heading font-bold text-white mb-6">
            @if(auth()->user()->role === 'instructor') Your Courses @else Available Courses @endif
        </h3>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $displayCourses = auth()->user()->role === 'instructor' ? auth()->user()->courses : \App\Models\Course::all();
            @endphp

            @forelse($displayCourses as $course)
                <div class="bg-ed-card rounded-2xl p-6 border border-gray-800 hover:border-ed-cyan/50 transition-colors group flex flex-col justify-between">
                    <div>
                        <h4 class="text-lg font-bold text-white mb-2">{{ $course->title }}</h4>
                        <p class="text-gray-400 text-sm mb-6 line-clamp-2">{{ $course->description }}</p>
                    </div>
                    <div class="flex justify-between items-center pt-4 border-t border-gray-700">
                        <a href="{{ route('courses.show', $course->id) }}" class="text-ed-cyan font-bold text-sm hover:text-white transition-colors flex items-center gap-1">
                            @if(auth()->user()->role === 'instructor') Manage Quiz @else View Course @endif 
                            <span class="text-lg leading-none">&rarr;</span>
                        </a>
                        <span class="text-xs text-gray-500 bg-ed-dark px-2 py-1 rounded border border-gray-700">#{{ $course->id }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center bg-ed-card rounded-2xl border border-gray-800">
                    <p class="text-gray-500">No courses available yet.</p>
                </div>
            @endforelse
        </div>
    </main>
</body>
</html>