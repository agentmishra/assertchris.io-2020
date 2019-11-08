<?php

namespace App\Http\Livewire;

use App\Models\Block;
use App\Models\Post;
use Livewire\Component;

class EditPost extends Component
{
    protected $post = null;

    public $updatedAt = null;

    public function mount($id)
    {
        $this->post = Post::find($id);
    }

    public function update()
    {
        $this->post->fresh();
        $this->updatedAt = now()->format("Y-m-d H:i:s");
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
                'heading_content' => 'A new heading',
                'position' =>  $position,
                'post_id' =>  $this->post->id,
            ]);
        }

        if ($type == 'text') {
            $block = Block::create([
                'type' =>  'text',
                'text_content' => 'Some new text',
                'position' =>  $position,
                'post_id' =>  $this->post->id,
            ]);
        }

        // increase the position of each subsequent block
        Block::where('id', '!=', $block->id)->where('position', '>=', $position)->increment('position');

        $this->reposition();
    }

    public function reposition() {
        $this->post->blocks()->orderBy('position', 'asc')->each(function($block, $i) {
            $block->position = $i + 1;
            $block->save();
        });
    }

    public function render()
    {
        $post = $this->post;
        $blocks = $post->blocks()->orderBy('position', 'asc')->get();

        return view('livewire.edit-post', compact('post', 'blocks'));
    }
}
