<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LearnTrack</title>
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
        <h2 class="text-3xl font-heading font-bold text-white mb-2 text-center">Welcome Back</h2>
        <p class="text-sm text-gray-400 text-center mb-8">Log in to continue to LearnTrack.</p>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-ed-cyan bg-ed-cyan/10 p-3 rounded-lg border border-ed-cyan/20">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full bg-ed-dark border border-gray-700 text-white p-4 rounded-xl focus:outline-none focus:border-ed-cyan transition-colors">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-400" />
            </div>

            <div>
                <label for="password" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Password</label>
                <input id="password" type="password" name="password" required class="w-full bg-ed-dark border border-gray-700 text-white p-4 rounded-xl focus:outline-none focus:border-ed-cyan transition-colors">
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-400" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded bg-ed-dark border-gray-700 text-ed-cyan focus:ring-ed-cyan" name="remember">
                    <span class="ms-2 text-sm text-gray-400">Remember me</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="text-sm text-ed-cyan hover:text-white transition-colors" href="{{ route('password.request') }}">Forgot password?</a>
                @endif
            </div>

            <button type="submit" class="w-full bg-ed-cyan text-ed-dark font-bold py-4 rounded-xl hover:bg-white transition-all shadow-[0_0_15px_rgba(6,182,212,0.3)] mt-4">
                Log In
            </button>
            
            <p class="text-center text-sm text-gray-500 mt-4">
                Don't have an account? <a href="{{ route('register') }}" class="text-ed-cyan font-bold hover:underline">Sign up</a>
            </p>
        </form>
    </div>
</body>
</html>