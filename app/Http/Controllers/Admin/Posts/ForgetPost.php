<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Models\Post;

class ForgetPost
{
    public function handle(Post $post)
    {
        $post->forget();

        $post->blocks->each(function($block) {
            $block->forget();
        });

        return redirect()->route('admin.posts.view-posts');
    }
}
