<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningProgress extends Model
{
    protected $table = 'learning_progress'; // Specific table name
    protected $fillable = ['user_id', 'topic_id', 'status', 'percentage', 'last_learned_at'];

    protected $casts = [
        'last_learned_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
