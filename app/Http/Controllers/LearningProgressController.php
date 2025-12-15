<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LearningProgressController extends Controller
{
    use AuthorizesRequests;

    public function update(Request $request, Topic $topic)
    {
        $this->authorize('view', $topic);

        $validated = $request->validate([
            'status' => 'required|in:planned,learning,completed',
            'percentage' => 'required|integer|min:0|max:100',
        ]);

        \App\Models\LearningProgress::updateOrCreate(
            ['user_id' => auth()->id(), 'topic_id' => $topic->id],
            [
                'status' => $validated['status'],
                'percentage' => $validated['percentage'],
                'last_learned_at' => now(),
            ]
        );

        return back()->with('success', 'Learning progress updated.');
    }
}
