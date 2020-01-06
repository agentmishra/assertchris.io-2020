<?php

namespace App\Models;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Post extends Model implements Feedable
{
    protected  $fillable = [
        'title',
        'slug',
        'intro',
    ];

    protected $casts = [
        'published_at' => 'date',
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
        return Markdown::convertToHtml($this->intro ? $this->intro : '');
    }

    public static function getFeedItems()
    {
        return static::all();
    }

    public function toFeedItem()
    {
        return FeedItem::create()
            ->id(route('posts.view-post', $this))
            ->title($this->title)
            ->summary($this->intro)
            ->updated($this->updated_at)
            ->link(route('posts.view-post', $this))
            ->category('post')
            ->author('Christopher Pitt');
    }
}
