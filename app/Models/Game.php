<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    // table name
    protected $table = 'games';
    // columns
    protected $fillable = [
        'name'  , 'path'
    ];
    public $timestamps = false;
    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'game_topic', 'topic_id', 'game_id');
    }
    public function pages()
    {
        return $this->belongsToMany(Page::class, 'game_page', 'page_id', 'game_id');
    }
}
