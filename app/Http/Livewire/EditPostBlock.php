<?php

namespace App\Http\Livewire;

use App\Models\Block;
use Livewire\Component;

class EditPostBlock extends Component
{
    protected $listeners = [
        'onPostBlockImageUploaded' => 'imageUploaded',
    ];

    public $block;
    public $changedAt;

    public function mount(Block $block)
    {
        $this->block = $block;
    }

    public function updateBlock($field, $value)
    {
        $this->block->$field = $value;
        $this->block->save();

        $this->emit('onBlockUpdated');
    }

    public function imageUploaded($blockId)
    {
        if ($blockId == $this->block->id) {
            $this->block->fresh();
            $this->changedAt = now()->timestamp;
        }
    }

    public function render()
    {
        return view('livewire.edit-post-block');
    }
}
