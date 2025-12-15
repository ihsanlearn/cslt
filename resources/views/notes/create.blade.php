<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            New Note for {{ $topic->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('topics.notes.store', $topic) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                            <input type="text" name="title"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Content (Markdown)</label>
                            <textarea name="content"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 font-mono"
                                rows="10" required></textarea>
                            <p class="text-xs text-gray-500 mt-1">Supports Markdown</p>
                        </div>
                        <div class="mb-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="is_public" value="1" class="form-checkbox">
                                <span class="ml-2">Make Public?</span>
                            </label>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Save
                            Note</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>