<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class EditPost extends Component
{
    protected $post = null;

    public function mount($id)
    {
        $this->post = Post::find($id);
    }

    public function updateField($field, $value)
    {
        $this->post->{$field} = $value;
        $this->post->save();

        if ($field === 'slug') {
            $this->redirect(route('admin.posts.edit-post', $this->post));
        }
    }

    public function render()
    {
        $post = $this->post;

        return view('livewire.edit-post', compact('post'));
    }
}
