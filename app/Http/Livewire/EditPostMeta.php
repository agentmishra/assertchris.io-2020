<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class EditPostMeta extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function updateField($field, $value)
    {
        $this->post->$field = $value;
        $this->post->save();

        if ($field === 'slug') {
            $this->redirect(route('admin.posts.edit-post', $this->post));
        }

        $this->emit('onPostUpdated');
    }

    public function render()
    {
        return view('livewire.edit-post-meta');
    }
}
