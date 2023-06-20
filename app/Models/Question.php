<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    // table name
    protected $table = 'questions';
    // columns
    protected $fillable = [
        'name',
        'content'
    ];
    // bilongtomany answers
public function answers()
    {
        return $this->belongsToMany(Answer::class, 'question_answer', 'question_id', 'answer_id');
    }

}
