<?php

use App\Models\Post;

return [
    'feeds' => [
        'main' => [
            'items' => Post::class . '@getFeedItems',
            'url' => '/feed',
            'title' => 'assertchris.io feed',
            'description' => 'Posts, slides, and videos by Christopher Pitt',
            'language' => 'en-US',
            'view' => 'feed::atom',
            'type' => 'application/atom+xml',
        ],
    ],
];
