<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class PostList extends Component
{
    public $posts;

    public function mount()
    {
        $this->loadPosts();
    }

    #[On('post-created')]
    public function postAdded($postId)
    {
        // Reload posts or append the new post
        $this->loadPosts();
    }

    public function loadPosts()
    {
        $this->posts = Post::with('user')->latest()->get()->map(function ($post) {
            $post->time_ago = $post->created_at->diffForHumans(); // Add "time ago" format
            return $post;
        });
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
