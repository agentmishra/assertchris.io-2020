<?php

namespace App\Http\Controllers;

use App\Models\Post;

class ShowHome extends Controller
{
    public function handle()
    {
        $posts = Post::latest()->whereNotNull('published_at')->paginate(10);

        return view('show-home', compact('posts'));
    }
}
