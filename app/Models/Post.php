<?php

namespace App\Models;

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
}
