<?php

use App\Models\Block;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        factory(Post::class, 20)->create()->each(function($post) {
            Block::create([
                'type' => 'heading',
                'heading_level' => 1,
                'heading_content' => 'A brand new post',
                'post_id' => $post->id,
                'order' => 1,
            ]);

            Block::create([
                'type' => 'text',
                'text_content' => 'time to write...',
                'post_id' => $post->id,
                'order' => 2,
            ]);
        });
    }
}
