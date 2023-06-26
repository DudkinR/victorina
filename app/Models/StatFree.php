<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatFree extends Model
{
    use HasFactory ;  
protected $table = 'statfree';
protected $fillable = [
'topic_id',
    'question_id',
    'result',
];

}
