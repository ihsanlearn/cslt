<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Note;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class NoteController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index(Topic $topic)
    {
        $this->authorize('view', $topic);
        $notes = $topic->notes;
        return view('notes.index', compact('topic', 'notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Topic $topic)
    {
        $this->authorize('update', $topic);
        return view('notes.create', compact('topic'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Topic $topic)
    {
        $this->authorize('update', $topic);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_public' => 'boolean',
        ]);

        $topic->notes()->create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . Str::random(5),
            'content' => $validated['content'],
            'is_public' => $request->boolean('is_public'),
        ]);

        return redirect()->route('topics.show', $topic)->with('success', 'Note created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        $this->authorize('view', $note);
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $this->authorize('update', $note);
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_public' => 'boolean',
        ]);

        $note->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . Str::random(5),
            'content' => $validated['content'],
            'is_public' => $request->boolean('is_public'),
        ]);

        return redirect()->route('notes.show', $note)->with('success', 'Note updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);
        $topic = $note->topic;
        $note->delete();
        return redirect()->route('topics.show', $topic)->with('success', 'Note deleted.');
    }
}
