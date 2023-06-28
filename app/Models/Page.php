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
    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_page', 'page_id', 'game_id');
    }
   public function topics()
    {
        return $this->belongsToMany(Topic::class, 'page_topic', 'page_id', 'topic_id');
    }
}
