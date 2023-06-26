<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatUser extends Model
{
    use HasFactory;
protected $table = 'stat_users';
protected $fillable = ['user_id', 'topic_id', 'question_id', 'result'];
}
