<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Quick Actions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold mb-4">Welcome back, {{ Auth::user()->name }}!</h3>
                        <p class="mb-4 text-gray-600">Continue your learning journey.</p>
                        <div class="flex space-x-4">
                            <a href="{{ route('categories.index') }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Browse Categories
                            </a>
                            <a href="{{ route('categories.create') }}"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded">
                                + New Category
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Progress -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold mb-4">Learning Status</h3>
                        @php
                            $learningCount = \App\Models\LearningProgress::where('user_id', Auth::id())->where('status', 'learning')->count();
                            $completedCount = \App\Models\LearningProgress::where('user_id', Auth::id())->where('status', 'completed')->count();
                            $plannedCount = \App\Models\LearningProgress::where('user_id', Auth::id())->where('status', 'planned')->count();
                        @endphp
                        <div class="grid grid-cols-3 gap-4 text-center">
                            <div class="p-2 bg-yellow-100 rounded">
                                <span class="block text-2xl font-bold text-yellow-600">{{ $learningCount }}</span>
                                <span class="text-xs text-yellow-800">Learning</span>
                            </div>
                            <div class="p-2 bg-green-100 rounded">
                                <span class="block text-2xl font-bold text-green-600">{{ $completedCount }}</span>
                                <span class="text-xs text-green-800">Completed</span>
                            </div>
                            <div class="p-2 bg-gray-100 rounded">
                                <span class="block text-2xl font-bold text-gray-600">{{ $plannedCount }}</span>
                                <span class="text-xs text-gray-800">Planned</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>