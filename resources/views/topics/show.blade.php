<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $topic->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content: Notes -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-bold">Notes</h3>
                            <a href="{{ route('topics.notes.create', $topic) }}"
                                class="bg-green-500 hover:bg-green-700 text-white text-sm font-bold py-1 px-3 rounded">
                                + Add Note
                            </a>
                        </div>

                        @if($topic->notes->count() > 0)
                            <div class="space-y-3">
                                @foreach($topic->notes as $note)
                                    <div class="border-l-4 border-blue-500 bg-gray-50 p-4 rounded hover:bg-gray-100 transition">
                                        <a href="{{ route('notes.show', $note) }}" class="block">
                                            <h4 class="font-bold text-gray-800">{{ $note->title }}</h4>
                                            <p class="text-xs text-gray-500 mt-1">Updated
                                                {{ $note->updated_at->diffForHumans() }}
                                            </p>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">No notes yet.</p>
                        @endif
                    </div>
                </div>

                <!-- Sidebar: Progress & Info -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-bold mb-4">Learning Progress</h3>
                        @php
                            $progress = $topic->learningProgress()->where('user_id', auth()->id())->first();
                            $status = $progress ? $progress->status : 'planned';
                            $percentage = $progress ? $progress->percentage : 0;
                        @endphp

                        <form action="{{ route('learning-progress.update', $topic) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Status</label>
                                <select name="status" class="w-full border rounded px-2 py-1"
                                    onchange="this.form.submit()">
                                    <option value="planned" {{ $status == 'planned' ? 'selected' : '' }}>Planned</option>
                                    <option value="learning" {{ $status == 'learning' ? 'selected' : '' }}>Learning
                                    </option>
                                    <option value="completed" {{ $status == 'completed' ? 'selected' : '' }}>Completed
                                    </option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Percentage:
                                    {{ $percentage }}%</label>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 mb-2">
                                    <div class="bg-blue-600 h-2.5 rounded-full transition-all duration-500"
                                        style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-bold mb-2">Details</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ $topic->description }}</p>
                        <a href="{{ route('categories.topics.index', $topic->category) }}"
                            class="text-blue-500 text-sm hover:underline">
                            &larr; Back to {{ $topic->category->name }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>