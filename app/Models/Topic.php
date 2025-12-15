<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['category_id', 'name', 'slug', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function learningProgress()
    {
        return $this->hasOne(LearningProgress::class);
    }
}
