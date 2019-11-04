<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Models\Post;

class ViewPosts
{
    public function handle()
    {
        $posts = Post::paginate(15);

        return view('admin.posts.view-posts', compact('posts'));
    }
}
