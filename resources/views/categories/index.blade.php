<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold">Your Knowledge Categories</h3>
                        <a href="{{ route('categories.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            New Category
                        </a>
                    </div>

                    @if($categories->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($categories as $category)
                                <div class="border rounded-lg p-4 hover:shadow-lg transition">
                                    <h4 class="font-bold text-xl mb-2">
                                        <a href="{{ route('categories.topics.index', $category) }}"
                                            class="text-blue-600 hover:underline">
                                            {{ $category->name }}
                                        </a>
                                    </h4>
                                    <p class="text-gray-600 mb-4">{{ Str::limit($category->description, 100) }}</p>
                                    <div class="flex justify-between text-sm text-gray-500">
                                        <span>{{ $category->topics->count() }} Topics</span>
                                        <div>
                                            <a href="{{ route('categories.edit', $category) }}"
                                                class="text-yellow-500 hover:underline mr-2">Edit</a>
                                            <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                                class="inline" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">You don't have any categories yet. Create one to get started!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>