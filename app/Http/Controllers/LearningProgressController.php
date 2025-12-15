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
        ]);

        $percentage = match ($validated['status']) {
            'completed' => 100,
            'learning' => 50,
            default => 0,
        };

        \App\Models\LearningProgress::updateOrCreate(
            ['user_id' => auth()->id(), 'topic_id' => $topic->id],
            [
                'status' => $validated['status'],
                'percentage' => $percentage,
                'last_learned_at' => now(),
            ]
        );

        return back()->with('success', 'Learning progress updated.');
    }
}
