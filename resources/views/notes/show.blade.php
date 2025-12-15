<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $note->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6 flex justify-between items-center">
                        <a href="{{ route('topics.show', $note->topic) }}" class="text-blue-500 hover:underline">&larr;
                            Back to Topic</a>
                        <div class="space-x-2">
                            @foreach($note->tags as $tag)
                                <span
                                    class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">#{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="prose max-w-none">
                        {!! Str::markdown($note->content) !!}
                    </div>

                    <div class="mt-8 border-t pt-4 flex justify-between">
                        <span class="text-sm text-gray-500">Last updated:
                            {{ $note->updated_at->format('M d, Y') }}</span>
                        <a href="{{ route('notes.edit', $note) }}" class="text-yellow-600 hover:underline">Edit Note</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>