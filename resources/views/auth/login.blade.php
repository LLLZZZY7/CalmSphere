<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-white px-4">
        <!-- Logo -->
        <div class="mb-8 text-center">
            <div class="flex items-center justify-center gap-2 mb-2">
                <div class="w-10 h-10 bg-sky-400 rounded-full flex items-center justify-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                    </svg>
                </div>
                <span class="text-2xl font-bold text-sky-600">CalmSphere</span>
            </div>
        </div>

        <!-- Title -->
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Welcome Back</h2>
        <p class="text-gray-500 mb-8">Sign in to continue your journey</p>

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" class="w-full max-w-md">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:border-sky-500 focus:bg-white focus:ring-0 transition duration-200"
                    placeholder="Enter your email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:border-sky-500 focus:bg-white focus:ring-0 transition duration-200"
                    placeholder="Enter your password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Sign In Button -->
            <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-blue-400 to-purple-400 hover:from-blue-500 hover:to-purple-500 text-white font-semibold rounded-xl shadow-lg transform transition hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
                Sign In
            </button>

            <!-- Sign Up Link -->
            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-sky-500 hover:text-sky-600 font-medium">Sign up</a>
                </p>
            </div>

            <!-- Back to Home -->
            <div class="mt-8 text-center">
                <a href="/" class="text-gray-500 hover:text-gray-700 flex items-center justify-center gap-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to home
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
