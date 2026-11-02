<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnTrack - Premium Learning</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"DM Sans"', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            purple: '#8B5CF6',
                            pink: '#EC4899',
                            dark: '#111827'
                        }
                    }
                }
            }
        }
    </script>

    <style>
        .bg-mesh {
            background-color: #f8fafc;
            background-image: 
                radial-gradient(at 40% 20%, hsla(280,100%,76%,0.25) 0px, transparent 50%),
                radial-gradient(at 80% 0%, hsla(189,100%,56%,0.25) 0px, transparent 50%),
                radial-gradient(at 0% 50%, hsla(355,100%,93%,0.25) 0px, transparent 50%),
                radial-gradient(at 80% 50%, hsla(340,100%,76%,0.25) 0px, transparent 50%),
                radial-gradient(at 0% 100%, hsla(22,100%,77%,0.25) 0px, transparent 50%),
                radial-gradient(at 80% 100%, hsla(242,100%,70%,0.25) 0px, transparent 50%),
                radial-gradient(at 0% 0%, hsla(343,100%,76%,0.25) 0px, transparent 50%);
        }
    </style>
</head>
<body class="min-h-screen bg-mesh font-sans text-slate-800 flex flex-col overflow-x-hidden">

    <!-- Floating Premium Navbar -->
    <div class="w-full fixed top-4 md:top-6 z-50 px-4 md:px-8 flex justify-center">
        <nav class="w-full max-w-6xl bg-white/80 backdrop-blur-2xl border border-white/60 shadow-[0_8px_30px_rgb(0,0,0,0.08)] rounded-2xl md:rounded-full px-4 md:px-8 py-3 flex justify-between items-center transition-all">
            
            <!-- Logo -->
            <div class="flex items-center gap-2 md:gap-3">
                <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-tr from-brand-purple to-brand-pink rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/30">
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h1 class="text-xl md:text-2xl font-heading font-extrabold text-brand-dark tracking-tight">LearnTrack.</h1>
            </div>
            
            <!-- Auth Buttons -->
            <div class="flex items-center gap-2 md:gap-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm md:text-base font-bold text-slate-600 hover:text-brand-purple transition-colors">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm md:text-base font-bold text-slate-600 hover:text-brand-purple transition-colors">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-brand-dark text-white px-4 md:px-6 py-2 md:py-2.5 rounded-xl text-xs md:text-sm font-bold hover:bg-black transition-all shadow-lg hover:-translate-y-0.5 whitespace-nowrap">Sign Up</a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>
    </div>

    <!-- Spacer for fixed navbar -->
    <div class="h-24 md:h-32"></div>

    <header class="max-w-4xl mx-auto px-5 md:px-8 py-10 md:py-16 text-center">
        <h2 class="text-3xl sm:text-4xl md:text-6xl font-heading font-extrabold text-brand-dark mb-5 md:mb-6 leading-[1.2]">
            Master New Skills with <br class="hidden sm:block">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-purple to-brand-pink">Interactive Quizzes</span>
        </h2>
        <p class="text-sm sm:text-base md:text-lg text-slate-600 max-w-2xl mx-auto mb-8 md:mb-10 px-2">
            Explore our curated courses, take challenging quizzes, and track your learning progress all in one place.
        </p>
        <a href="#courses" class="inline-block bg-gradient-to-r from-brand-purple to-brand-pink text-white font-bold py-3.5 md:py-4 px-8 md:px-10 rounded-2xl shadow-xl shadow-purple-500/30 hover:shadow-purple-500/50 hover:-translate-y-1 transition-all duration-300 text-sm md:text-base">
            Browse Courses
        </a>
    </header>

    <main id="courses" class="max-w-6xl mx-auto px-5 md:px-8 py-12 md:py-16 flex-grow w-full">
        <div class="flex items-center justify-between mb-8 md:mb-10">
            <h3 class="text-2xl md:text-3xl font-heading font-bold text-brand-dark">Available Courses</h3>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-8">
            @forelse($courses as $course)
                <div class="bg-white/90 backdrop-blur-xl rounded-[1.5rem] md:rounded-[2rem] p-6 md:p-8 border border-white shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all duration-300 hover:-translate-y-1.5 group flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 bg-purple-50 rounded-2xl flex items-center justify-center mb-5 md:mb-6 text-brand-purple group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        </div>
                        <h4 class="text-lg md:text-xl font-heading font-bold text-brand-dark mb-2 md:mb-3">{{ $course->title }}</h4>
                        <p class="text-slate-500 text-sm mb-5 md:mb-6 line-clamp-3 leading-relaxed">{{ $course->description }}</p>
                    </div>
                    <a href="#" class="inline-flex items-center text-brand-purple font-bold text-sm hover:text-brand-pink transition-colors">
                        View Course 
                        <svg class="w-4 h-4 ml-1.5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            @empty
                <div class="col-span-full bg-white/60 backdrop-blur-lg rounded-[1.5rem] md:rounded-[2rem] p-10 md:p-12 text-center border border-white">
                    <p class="text-slate-500 text-base md:text-lg">No courses available yet. Check back later!</p>
                </div>
            @endforelse
        </div>
    </main>

</body>
</html>