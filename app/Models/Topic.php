<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'image', 'description'];
    protected $table = 'topics';
    // belongsToMany() method is used to define many-to-many relationship between two models. Question and Topic models are related to each other through TopicQuestion model.
    public function questions()
    {
        return $this->belongsToMany(Question::class, 'topic_question', 'topic_id','question_id');
    }

     public function freestats()        
    {
        return $this->hasMany(StatFree::class, 'topic_id', 'question_id');
    }
}
