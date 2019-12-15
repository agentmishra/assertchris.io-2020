<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;

class ViewPost
{
    public function handle(Post $post)
    {
        return view('posts.view-post', compact('post'));
    }
}
