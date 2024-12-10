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
        $newPost = Post::with('user')->find($postId);


        if ($newPost) {
            $newPost->time_ago = $newPost->created_at->diffForHumans();       
            $this->posts->prepend($newPost); 
        }

        // dump('even listen from post-created');
        // $this->posts = "";
    }

    public function loadPosts()
    {   
        $this->posts = Post::with('user')->latest()->get()->map(function ($post) {
            $post->time_ago = $post->created_at->diffForHumans(); 
            return $post;
        });
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
