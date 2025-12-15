<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['user_id', 'name', 'slug', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function getUserProgress(User $user)
    {
        $topics = $this->topics;
        if ($topics->isEmpty()) {
            return 0;
        }

        $totalProgress = 0;
        foreach ($topics as $topic) {
            $progress = $topic->learningProgress()->where('user_id', $user->id)->first();
            $totalProgress += $progress ? $progress->percentage : 0;
        }

        return round($totalProgress / $topics->count());
    }
}
