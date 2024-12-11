<?php

namespace App\Livewire\Pages;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PostCommentsPage extends Component
{
    public Post $post;
 
    public function mount(Post $post) 
    {
        $this->post = $post;
        $this->post->increment("views");
    }

    #[Layout('layouts.app')] 
    public function render()
    {
        return view("livewire.pages.post");
    }
}