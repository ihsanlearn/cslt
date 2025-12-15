<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['topic_id', 'title', 'slug', 'content', 'is_public'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
