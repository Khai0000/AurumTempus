<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'watch_id', 'user_id', 'author', 'comment_title', 'comment_star_rating', 'comment_body'
    ];

    public function watch()
    {
        return $this->belongsTo(Watch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
