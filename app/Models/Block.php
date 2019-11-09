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
        'image_path',
        'image_arrangement',
        'image_content',
        'note_content',
        'code_language',
        'code_content',
        'position',
        'post_id',
    ];

    protected $touches = ['post'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
