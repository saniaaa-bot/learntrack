<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnTrack - Master New Skills</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        ed: {
                            dark: '#0B1120',
                            card: '#151E31',
                            cyan: '#06B6D4',
                            green: '#10B981'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glow-text { text-shadow: 0 0 20px rgba(6, 182, 212, 0.5); }
    </style>
</head>
<body class="min-h-screen bg-ed-dark font-sans text-gray-300 flex flex-col selection:bg-ed-cyan selection:text-white">

    <nav class="w-full border-b border-gray-800 bg-ed-dark/80 backdrop-blur-md py-4 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 flex justify-between items-center">
            <h1 class="text-2xl font-heading font-extrabold text-white tracking-tight flex items-center gap-2">
                <span class="text-ed-cyan">Learn</span>Track.
            </h1>
            <div class="flex items-center gap-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-medium hover:text-ed-cyan transition-colors">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium hover:text-ed-cyan transition-colors">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-ed-cyan text-ed-dark px-5 py-2 rounded-lg text-sm font-bold hover:bg-white transition-all shadow-[0_0_15px_rgba(6,182,212,0.4)]">Sign Up</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <header class="max-w-4xl mx-auto px-6 py-24 md:py-32 text-center flex-grow flex flex-col justify-center">
        <h2 class="text-5xl md:text-7xl font-heading font-extrabold text-white mb-6 leading-tight">
            Level Up Your <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-ed-cyan to-ed-green glow-text">Tech Skills.</span>
        </h2>
        <p class="text-lg text-gray-400 max-w-2xl mx-auto mb-10">
            Interactive courses, real-world projects, and automated quizzes. Everything you need to become a better developer.
        </p>
        <div>
            <a href="#courses" class="inline-block bg-white text-ed-dark font-bold py-4 px-10 rounded-xl hover:bg-ed-cyan hover:text-white transition-all duration-300 shadow-xl">
                Explore Courses
            </a>
        </div>
    </header>

    <main id="courses" class="max-w-6xl mx-auto px-6 py-16 w-full">
        <div class="flex items-center justify-between mb-10 border-b border-gray-800 pb-4">
            <h3 class="text-3xl font-heading font-bold text-white">Featured Courses</h3>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($courses as $course)
                <div class="bg-ed-card rounded-2xl p-8 border border-gray-800 hover:border-ed-cyan/50 transition-all duration-300 group flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 bg-ed-dark rounded-xl flex items-center justify-center mb-6 text-ed-cyan border border-gray-700 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-white mb-3">{{ $course->title }}</h4>
                        <p class="text-gray-400 text-sm mb-6 line-clamp-3">{{ $course->description }}</p>
                    </div>
                    
                    <!-- Smart Link: Redirect to course if logged in, otherwise to login -->
                    @auth
                        <a href="{{ route('courses.show', $course->id) }}" class="inline-flex items-center text-ed-cyan font-bold text-sm hover:text-white transition-colors mt-4">
                            Start Learning <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center text-ed-cyan font-bold text-sm hover:text-white transition-colors mt-4">
                            Start Learning <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    @endauth
                </div>
            @empty
                <div class="col-span-full py-12 text-center text-gray-500">
                    No courses available yet.
                </div>
            @endforelse
        </div>
    </main>

</body>
</html>