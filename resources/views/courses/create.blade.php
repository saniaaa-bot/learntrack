<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course - LearnTrack</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    
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
</head>
<body class="min-h-screen bg-ed-dark font-sans text-gray-300 flex justify-center items-center p-6">

    <div class="w-full max-w-2xl">
        
        <div class="bg-ed-card p-8 md:p-10 rounded-3xl border border-gray-800 shadow-2xl relative overflow-hidden">
            
            <!-- Subtle Glow Background -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-ed-cyan rounded-full mix-blend-screen filter blur-[100px] opacity-20 pointer-events-none"></div>

            <div class="relative z-10">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 bg-ed-dark rounded-xl flex items-center justify-center text-ed-cyan border border-gray-700 shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-heading font-bold text-white">Create New Course</h2>
                        <p class="text-sm text-gray-400">Add a new course to your instructor profile.</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="bg-red-900/30 text-red-400 p-4 rounded-xl mb-6 text-sm border border-red-800">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('courses.store') }}" method="POST" class="space-y-6 relative z-10">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Course Title</label>
                        <input type="text" name="title" placeholder="e.g., Mastering JavaScript" class="w-full bg-ed-dark border border-gray-700 text-white p-4 rounded-xl focus:outline-none focus:border-ed-cyan transition-colors" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Course Description</label>
                        <textarea name="description" rows="4" placeholder="What will students learn in this course? Add a detailed outline." class="w-full bg-ed-dark border border-gray-700 text-white p-4 rounded-xl focus:outline-none focus:border-ed-cyan transition-colors" required></textarea>
                    </div>

                    <div class="flex flex-col md:flex-row gap-4 pt-4 border-t border-gray-800 mt-8">
                        <a href="{{ route('dashboard') }}" class="w-full md:w-1/3 text-center bg-gray-800 text-white font-bold py-4 rounded-xl hover:bg-gray-700 transition-colors">
                            Cancel
                        </a>
                        <button type="submit" class="w-full md:w-2/3 bg-ed-cyan text-ed-dark font-bold py-4 rounded-xl hover:bg-white transition-all shadow-[0_0_15px_rgba(6,182,212,0.3)]">
                            Publish Course
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>