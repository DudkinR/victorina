<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
// table name
    protected $table = 'answers';
// columns
    protected $fillable = [
        'content'  , 'user_id', 'permission'
    ];
// bilongtomany questions
    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_answer', 'answer_id', 'question_id');
    }
}
