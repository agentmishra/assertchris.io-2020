<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Models\Post;

class CreatePost
{
    public function handle()
    {
        $post = Post::create([
            'title' => 'a new post',
            'slug' => date('Y-m-d-') . 'a-new-post',
        ]);

        return redirect()->route('admin.posts.edit-post', $post);
    }
}
