<?php

namespace App\Http\Livewire;

use App\Models\Block;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;

class EditPost extends Component
{
    protected $post = null;

    protected $listeners = ['uploadImage' => 'uploadImage'];

    public $updated_at = null;


    public function mount($id)
    {
        $this->post = Post::find($id);
    }

    public function update()
    {
        $this->post->fresh();
        $this->updated_at = now()->format('j F Y, g:ia');
    }

    public function updatePostField($field, $value)
    {
        $this->post->{$field} = $value;
        $this->post->save();

        if ($field === 'slug') {
            $this->redirect(route('admin.posts.edit-post', $this->post));
        }

        $this->update();
    }

    public function updateBlockField($id, $field, $value)
    {
        $block = $this->post->blocks()->find($id);
        $block->{$field} = $value;
        $block->save();

        $this->update();
    }

    public function removeBlock($id)
    {
        $block = $this->post->blocks()->find($id);
        $block->delete();

        $this->reposition();
        $this->update();
    }

    public function addBlock($position, $type, $variation = null)
    {
        if ($type == 'heading') {
            $block = Block::create([
                'type' =>  'heading',
                'heading_level' => $variation,
                'heading_content' => 'A heading',
                'position' =>  $position,
                'post_id' =>  $this->post->id,
            ]);
        }

        if ($type == 'text') {
            $block = Block::create([
                'type' =>  'text',
                'text_content' => 'Some text',
                'position' =>  $position,
                'post_id' =>  $this->post->id,
            ]);
        }

        if ($type == 'image') {
            $block = Block::create([
                'type' =>  'image',
                'image_arrangement' => 'centered',
                'image_content' => 'An image description',
                'position' =>  $position,
                'post_id' =>  $this->post->id,
            ]);
        }

        if ($type == 'note') {
            $block = Block::create([
                'type' =>  'note',
                'note_content' => 'A note',
                'position' =>  $position,
                'post_id' =>  $this->post->id,
            ]);
        }

        if ($type == 'code') {
            $block = Block::create([
                'type' =>  'code',
                'code_language' => 'php',
                'code_content' => 'Some code',
                'position' =>  $position,
                'post_id' =>  $this->post->id,
            ]);
        }

        // increase the position of each subsequent block
        Block::where('id', '!=', $block->id)->where('position', '>=', $position)->increment('position');

        $this->reposition();
        $this->update();
    }

    public function reposition() {
        $this->post->blocks()->orderBy('position', 'asc')->each(function($block, $i) {
            $block->position = $i + 1;
            $block->save();
        });
    }

    public function uploadImage($id, $name, $type, $size, $data)
    {
        $raw = substr($data, strpos($data, ',') + 1);
        $raw = base64_decode($raw);

        $uuid = (string) Str::uuid();
        $extension = pathinfo($name, PATHINFO_EXTENSION);

        app('filesystem')->disk('spaces')->put("portfolio/images/{$uuid}.{$extension}", $raw, 'public');

        $block = $this->post->blocks()->find($id);
        $block->image_path = "portfolio/images/{$uuid}.{$extension}";
        $block->save();
        
        $this->update();
    }

    public function render()
    {
        $post = $this->post;
        $blocks = $post->blocks()->orderBy('position', 'asc')->get();

        return view('livewire.edit-post', compact('post', 'blocks'));
    }
}
