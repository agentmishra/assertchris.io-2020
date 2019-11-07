<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = [
        'type',
        'heading_content',
        'heading_level',
        'text_content',
        'order',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
