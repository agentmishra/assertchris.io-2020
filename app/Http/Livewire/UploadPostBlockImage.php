<?php

namespace App\Http\Livewire;

use App\Models\Block;
use Illuminate\Support\Str;
use Livewire\Component;

class UploadPostBlockImage extends Component
{
    protected $listeners = [
        'onUploadImage' => 'uploadImage',
    ];

    public function uploadImage($blockId, $name, $type, $size, $data)
    {
        $raw = substr($data, strpos($data, ',') + 1);
        $raw = base64_decode($raw);

        $uuid = (string) Str::uuid();
        $extension = pathinfo($name, PATHINFO_EXTENSION);

        app('filesystem')->disk('spaces')->put("portfolio/images/{$uuid}.{$extension}", $raw, 'public');

        $block = Block::findOrFail($blockId);
        $block->image_path = "portfolio/images/{$uuid}.{$extension}";
        $block->save();

        $this->emit('onPostBlockImageUploaded', $block->id);
    }

    public function render()
    {
        return view('livewire.upload-post-block-image');
    }
}
