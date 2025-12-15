<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $category->name }} - Topics
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('categories.index') }}" class="text-blue-500 hover:underline">&larr; Back to
                            Categories</a>
                    </div>

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold">Topics in {{ $category->name }}</h3>
                        <a href="{{ route('categories.topics.create', $category) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add Topic
                        </a>
                    </div>

                    @if($topics->count() > 0)
                        <div class="space-y-4">
                            @foreach($topics as $topic)
                                <div class="border rounded-lg p-4 hover:bg-gray-50 flex justify-between items-center">
                                    <div>
                                        <h4 class="font-bold text-lg">
                                            <a href="{{ route('topics.show', $topic) }}" class="text-blue-600 hover:underline">
                                                {{ $topic->name }}
                                            </a>
                                        </h4>
                                        <p class="text-gray-600 text-sm">{{ Str::limit($topic->description, 80) }}</p>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <span class="text-xs font-semibold bg-gray-200 px-2 py-1 rounded">
                                            {{ $topic->notes->count() }} Notes
                                        </span>
                                        @php
                                            $progress = $topic->learningProgress()->where('user_id', auth()->id())->first();
                                            $status = $progress ? $progress->status : 'planned';
                                            $percentage = $progress ? $progress->percentage : 0;
                                            $color = match ($status) {
                                                'completed' => 'green',
                                                'learning' => 'yellow',
                                                default => 'gray'
                                            };
                                        @endphp

                                        <div class="flex flex-col w-24">
                                            <div class="flex justify-end text-xs mb-0.5">
                                                <span class="text-gray-500 font-semibold">{{ $percentage }}%</span>
                                            </div>
                                            <div class="w-full bg-gray-200 rounded-full h-1.5">
                                                <div class="bg-{{ $color }}-600 h-1.5 rounded-full"
                                                    style="width: {{ $percentage }}%"></div>
                                            </div>
                                        </div>

                                        <span class="text-xs uppercase font-bold text-{{ $color }}-600">
                                            {{ ucfirst($status) }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">No topics yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>