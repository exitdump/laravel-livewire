<?php

namespace App\Livewire;

use App\Services\PostService;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowMyPosts extends Component
{
    public $posts;

    public function mount(PostService $postService)
    {
        $this->posts = $postService->getPostsBy(auth()->user());
    }

    #[On('post-created')]
    public function refresh($postID) {
        
    }
    public function render()
    {
        return view('livewire.show-my-posts');
    }
}
