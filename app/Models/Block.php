<?php

namespace App\Models;

use GrahamCampbell\Markdown\Facades\Markdown;
use Highlight\Highlighter;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    public static $highlighter;

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

    public function getTextContentMarkdownAttribute()
    {
        return Markdown::convertToHtml($this->text_content);
    }

    public function getNoteContentMarkdownAttribute()
    {
        return Markdown::convertToHtml($this->note_content);
    }

    public function getCodeContentMarkdownAttribute()
    {
        preg_match("/^```([^\\n]+)/", $this->code_content, $matches);

        if (count($matches) < 2) {
            return Markdown::convertToHtml($this->code_content);
        }

        $lines = explode("\n", $this->code_content);
        array_shift($lines);
        array_pop($lines);
        $code = implode("\n", $lines);

        if (!static::$highlighter) {
            static::$highlighter = new Highlighter();
        }

        $highlighted = static::$highlighter->highlight($matches[1], $code);

        return "<pre><code class='hljs {$highlighted->language}'>{$highlighted->value}</code></pre>";
    }

    public function getImageUrlAttribute()
    {
        return app('filesystem')->disk('spaces')->url($this->image_path);
    }
}