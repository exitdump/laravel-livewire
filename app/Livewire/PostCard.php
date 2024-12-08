<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\On;

class PostCard extends Component
{
    public Post $post;

    
    public function mount(Post $post)
    {
        $this->post = $post;
    }


    public function render()
    {
        return view('livewire.post-card');
    }
}
