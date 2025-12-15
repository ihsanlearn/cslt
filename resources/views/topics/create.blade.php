<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Not Used?? Topics Create
        </h2>
    </x-slot>

    <!-- Wait, create topic needs form similar to category... -->
    <!-- I'll implement proper form later if needed, but for now simple one -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Add Topic to {{ $category->name }}</h3>
                    <form action="{{ route('categories.topics.store', $category) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                            <input type="text" name="name"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                            <textarea name="description"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                                rows="3"></textarea>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Create
                            Topic</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>