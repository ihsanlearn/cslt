<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Note: {{ $note->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('notes.update', $note) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                            <input type="text" name="title" value="{{ old('title', $note->title) }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Content (Markdown)</label>
                            <textarea name="content"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 font-mono"
                                rows="10" required>{{ old('content', $note->content) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="is_public" value="1" class="form-checkbox" {{ $note->is_public ? 'checked' : '' }}>
                                <span class="ml-2">Make Public?</span>
                            </label>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Update
                            Note</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>