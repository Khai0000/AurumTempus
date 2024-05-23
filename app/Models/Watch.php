<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'price', 'material_type', 'origin', 'strap_color', 'quantity', 'image','tag'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class)->cascadeDelete();
    }
}
