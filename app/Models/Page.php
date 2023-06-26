<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    public $fillable = [
        'title',
        'slug',
        'content',
        'is_published',
        'published_at',
        'user_id',
    ];

}
