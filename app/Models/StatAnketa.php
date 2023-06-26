<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatAnketa extends Model
{
    use HasFactory;
    protected $table = 'stat_anketas';
    protected $fillable = ['topic_id', 'question_id', 'answer_id'];
}
