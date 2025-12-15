<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <div class="flex max-w-7xl mx-auto">
            <!-- Sidebar -->
            <aside class="w-64 bg-white min-h-screen border-r border-gray-200 hidden md:block">
                <div class="p-6">
                    <h2 class="font-bold text-gray-700 text-lg mb-4">Knowledge Base</h2>
                    <a href="{{ route('dashboard') }}"
                        class="block py-2 text-gray-600 hover:text-blue-600 {{ request()->routeIs('dashboard') ? 'text-blue-600 font-semibold' : '' }}">Dashboard</a>
                    <a href="{{ route('categories.index') }}"
                        class="block py-2 text-gray-600 hover:text-blue-600 {{ request()->routeIs('categories.*') ? 'text-blue-600 font-semibold' : '' }}">All
                        Learning</a>

                    <div class="mt-6">
                        <h3 class="uppercase text-xs font-semibold text-gray-400 mb-2">My Learning</h3>
                        <ul>
                            @foreach(\Illuminate\Support\Facades\Auth::user()->categories()->orderBy('name')->get() as $sidebarCategory)
                                <li>
                                    <a href="{{ route('categories.topics.index', $sidebarCategory) }}"
                                        class="block py-1 text-sm text-gray-600 hover:text-blue-600 truncate {{ request()->is('categories/' . $sidebarCategory->id . '*') ? 'text-blue-600' : '' }}">
                                        {{ $sidebarCategory->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </aside>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>