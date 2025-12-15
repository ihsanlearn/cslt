<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TopicController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        $this->authorize('view', $category);
        $topics = $category->topics;
        return view('topics.index', compact('category', 'topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category)
    {
        $this->authorize('update', $category); // Can add topic if can update category
        return view('topics.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Category $category)
    {
        $this->authorize('update', $category);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->topics()->create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'],
        ]);

        return redirect()->route('categories.topics.index', $category)->with('success', 'Topic created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        $this->authorize('view', $topic);
        $topic->load('notes');
        return view('topics.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        $this->authorize('update', $topic);
        return view('topics.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        $this->authorize('update', $topic);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $topic->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'],
        ]);

        return redirect()->route('topics.show', $topic)->with('success', 'Topic updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        $this->authorize('delete', $topic);
        $category = $topic->category;
        $topic->delete();
        return redirect()->route('categories.topics.index', $category)->with('success', 'Topic deleted successfully.');
    }
}
