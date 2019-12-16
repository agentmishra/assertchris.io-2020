<?php

namespace App\Models;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected  $fillable = [
        'title',
        'slug',
        'intro',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function blocks()
    {
        return $this->hasMany(Block::class)->orderBy('position', 'asc');
    }

    public function getIntroMarkdownAttribute()
    {
        return Markdown::convertToHtml($this->intro);
    }
}
