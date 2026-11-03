<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LearnTrack</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Inter', 'sans-serif'], heading: ['Outfit', 'sans-serif'] }, colors: { ed: { dark: '#0B1120', card: '#151E31', cyan: '#06B6D4' } } } }
        }
    </script>
</head>
<body class="min-h-screen bg-ed-dark font-sans text-gray-300 flex items-center justify-center p-6">
    <div class="w-full max-w-md bg-ed-card p-8 rounded-3xl border border-gray-800 shadow-2xl">
        <h2 class="text-3xl font-heading font-bold text-white mb-2 text-center">Create Account</h2>
        <p class="text-sm text-gray-400 text-center mb-8">Join LearnTrack to start learning or teaching.</p>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf
            <div>
                <label for="name" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full bg-ed-dark border border-gray-700 text-white p-4 rounded-xl focus:outline-none focus:border-ed-cyan transition-colors">
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs text-red-400" />
            </div>

            <div>
                <label for="email" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required class="w-full bg-ed-dark border border-gray-700 text-white p-4 rounded-xl focus:outline-none focus:border-ed-cyan transition-colors">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-400" />
            </div>

            <div>
                <label for="role" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Register As</label>
                <select id="role" name="role" class="w-full bg-ed-dark border border-gray-700 text-white p-4 rounded-xl focus:outline-none focus:border-ed-cyan transition-colors">
                    <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="instructor" {{ old('role') == 'instructor' ? 'selected' : '' }}>Instructor</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2 text-xs text-red-400" />
            </div>

            <div>
                <label for="password" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Password</label>
                <input id="password" type="password" name="password" required class="w-full bg-ed-dark border border-gray-700 text-white p-4 rounded-xl focus:outline-none focus:border-ed-cyan transition-colors">
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-400" />
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full bg-ed-dark border border-gray-700 text-white p-4 rounded-xl focus:outline-none focus:border-ed-cyan transition-colors">
            </div>

            <button type="submit" class="w-full bg-ed-cyan text-ed-dark font-bold py-4 rounded-xl hover:bg-white transition-all shadow-[0_0_15px_rgba(6,182,212,0.3)] mt-4">
                Sign Up
            </button>
            
            <p class="text-center text-sm text-gray-500 mt-4">
                Already have an account? <a href="{{ route('login') }}" class="text-ed-cyan font-bold hover:underline">Log in</a>
            </p>
        </form>
    </div>
</body>
</html>