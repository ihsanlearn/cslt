<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Master Your Knowledge</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans text-gray-900 bg-gray-50 selection:bg-blue-500 selection:text-white">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="container mx-auto px-6 py-6 flex justify-between items-center relative z-10">
            <div class="flex items-center">
                <x-application-logo class="h-10 w-auto fill-current text-blue-600" />
                <span class="ml-3 text-xl font-bold tracking-wide text-gray-800">LearnHub</span>
            </div>
            <div class="flex items-center space-x-4 rounded-full">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="group flex items-center transition">
                            <span class="sr-only">Dashboard</span>
                            <div class="p-0.5 rounded-full border-2 border-transparent group-hover:border-blue-500 transition">
                                 <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random&color=fff" alt="{{ Auth::user()->name }}" class="h-8 w-8 rounded-full shadow-sm group-hover:shadow-md">
                            </div>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-600 hover:text-blue-600 transition">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">Get Started</a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>

        <!-- Hero Section -->
        <main class="flex-grow container mx-auto px-6 flex flex-col md:flex-row items-center justify-center py-12 md:py-24 relative">
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-blue-100 rounded-full blur-3xl opacity-50 -z-10"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-purple-100 rounded-full blur-3xl opacity-50 -z-10"></div>

            <div class="w-full md:w-1/2 lg:w-5/12 text-center md:text-left z-10">
                <h1 class="text-5xl md:text-6xl font-extrabold leading-tight tracking-tight mb-6 text-gray-900">
                    Master Your <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Learning Journey</span>
                </h1>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    Organize your knowledge, track your progress, and achieve your goals with our personal learning management system.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="{{ route('register') }}" class="px-8 py-4 text-base font-bold text-white bg-gray-900 rounded-xl hover:bg-gray-800 transition shadow-xl hover:shadow-2xl hover:-translate-y-1">
                        Start Learning Free
                    </a>
                    <a href="#features" class="px-8 py-4 text-base font-bold text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition shadow-sm hover:shadow-md">
                        Explore Features
                    </a>
                </div>
            </div>

            <div class="w-full md:w-1/2 lg:w-6/12 mt-12 md:mt-0 relative">
                <div class="relative rounded-2xl bg-white shadow-2xl border border-gray-100 p-2 transform rotate-2 hover:rotate-0 transition duration-500">
                     <!-- Abstract UI Mockup -->
                     <div class="rounded-xl overflow-hidden bg-gray-50">
                        <div class="h-8 bg-gray-100 border-b flex items-center px-4 space-x-2">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                            <div class="w-3 h-3 rounded-full bg-green-400"></div>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between items-center">
                                <div class="h-6 w-1/3 bg-gray-200 rounded"></div>
                                <div class="h-8 w-8 bg-blue-100 rounded-full text-blue-600 flex items-center justify-center text-xs font-bold">85%</div>
                            </div>
                            <div class="h-32 bg-white border border-gray-200 rounded-lg p-4 space-y-2">
                                <div class="h-4 w-3/4 bg-gray-100 rounded"></div>
                                <div class="h-4 w-1/2 bg-gray-100 rounded"></div>
                                <div class="h-4 w-full bg-gray-100 rounded"></div>
                            </div>
                            <div class="flex space-x-3">
                                <div class="h-10 w-24 bg-blue-600 rounded-lg opacity-90"></div>
                                <div class="h-10 w-24 bg-gray-200 rounded-lg"></div>
                            </div>
                        </div>
                     </div>
                </div>
                <!-- Floating Badge -->
                <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-xl border border-gray-100 flex items-center space-x-3 animate-bounce-slow">
                    <div class="bg-green-100 p-2 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-semibold uppercase">Progress</p>
                        <p class="text-sm font-bold text-gray-900">Topic Completed!</p>
                    </div>
                </div>
            </div>
        </main>

        <!-- Features Section -->
        <section id="features" class="py-20 bg-white relative overflow-hidden">
             <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why use LearnHub?</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Everything you need to structure your self-study and keep track of your growth.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-10">
                    <!-- Feature 1 -->
                    <div class="bg-gray-50 rounded-2xl p-8 transition hover:-translate-y-2 hover:shadow-lg border border-transparent hover:border-gray-100">
                        <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6 text-blue-600">
                           <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Structured Learning</h3>
                        <p class="text-gray-600">Break down complex subjects into Categories and Topics. Keep your learning path clear and organized.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-gray-50 rounded-2xl p-8 transition hover:-translate-y-2 hover:shadow-lg border border-transparent hover:border-gray-100">
                        <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-6 text-purple-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Track Progress</h3>
                        <p class="text-gray-600">Visualize your journey with progress bars and status updates. See how far you've come at a glance.</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-gray-50 rounded-2xl p-8 transition hover:-translate-y-2 hover:shadow-lg border border-transparent hover:border-gray-100">
                        <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6 text-green-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Markdown Notes</h3>
                        <p class="text-gray-600">Write beautiful notes with full Markdown support. Code snippets, lists, and formatting made easy.</p>
                    </div>
                </div>
             </div>
        </section>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-100 py-10">
            <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                     <span class="text-lg font-bold text-gray-900">LearnHub</span>
                     <p class="text-sm text-gray-500 mt-1">© {{ date('Y') }} LearnHub. All rights reserved.</p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-gray-600 transition"><span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </div>
        </footer>
    </div>
    
    <style>
        .animate-bounce-slow {
            animation: bounce 3s infinite;
        }
        @keyframes bounce {
            0%, 100% {
                transform: translateY(-5%);
                animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
            }
            50% {
                transform: translateY(0);
                animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
            }
        }
    </style>
</body>
</html>
