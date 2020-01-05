<?php

namespace App\Http\Livewire;

use App\Models\Block;
use App\Models\Post;
use Livewire\Component;

class EditPost extends Component
{
    protected $listeners = [
        'onPostUpdated' => 'update',
        'onRemoveBlock' => 'removeBlock',
        'onMoveBlockUp' => 'moveBlockUp',
        'onMoveBlockDown' => 'moveBlockDown',
    ];

    public $post;
    public $changedAt;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function update()
    {
        $this->post->fresh();
        $this->changedAt = now()->timestamp;
    }

    public function removeBlock($blockId)
    {
        $block = $this->post->blocks()->find($blockId);
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

    public function reposition()
    {
        $this->post->blocks()->orderBy('position', 'asc')->each(function($block, $i) {
            $block->position = $i + 1;
            $block->save();
        });
    }

    public function moveBlockUp($blockId)
    {
        $block = Block::findOrFail($blockId);

        $previous = $this->post->blocks()->where('position', $block->position - 1)->first();

        if ($previous) {
            $previous->position += 1;
            $previous->save();
        }

        $block->position -= 1;
        $block->save();

        $this->reposition();
        $this->update();
    }

    public function moveBlockDown($blockId)
    {
        $block = Block::findOrFail($blockId);

        $next = $this->post->blocks()->where('position', $block->position + 1)->first();

        if ($next) {
            $next->position -= 1;
            $next->save();
        }

        $block->position += 1;
        $block->save();

        $this->reposition();
        $this->update();
    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
