<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostCard extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;

        $this->post->increment('views');
    }

    public function render()
    {
        return view('livewire.post-card');
    }
}
