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
                                class="bg-blue-500 hover:bg-blue-700 text-gray-900 font-bold py-2 px-4 rounded">
                                Browse Learning
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
                        <div class="grid grid-cols-3 gap-4 text-center mb-6">
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

                        <h3 class="text-md font-bold mb-3 border-t pt-4">My Learning Paths</h3>
                        <div class="space-y-4">
                            @foreach(Auth::user()->categories()->take(3)->get() as $category)
                                <div>
                                    <div class="flex justify-between text-xs mb-1">
                                        <span class="font-medium">{{ $category->name }}</span>
                                        <span>{{ $category->getUserProgress(Auth::user()) }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-1.5">
                                        <div class="bg-blue-600 h-1.5 rounded-full"
                                            style="width: {{ $category->getUserProgress(Auth::user()) }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                            @if(Auth::user()->categories()->count() > 3)
                                <div class="text-center mt-2">
                                    <a href="{{ route('categories.index') }}"
                                        class="text-xs text-blue-500 hover:underline">View All Learning Paths</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>