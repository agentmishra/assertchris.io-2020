<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Models\Post;

class EditPost
{
    public function handle(Post $post)
    {
        return view('admin.posts.edit-post', compact('post'));
    }
}
