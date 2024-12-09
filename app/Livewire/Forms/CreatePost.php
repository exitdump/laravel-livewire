<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use App\Services\PostService;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreatePost extends Component
{
    #[Validate('required')] 
    public string $content = '';

    private PostService $postService;

    public function __construct()
    {
        $this->postService = app(PostService::class);
    }

    public function storePost()
    {
        
        $post = $this->postService->createPost( auth()->user(), $this->validate());

        $this->dispatch('post-created', postId: $post->id);

        $this->content = '';
        
        session()->flash('success', 'Your post was successfully created.');
    }

    public function render()
    {
        return view('livewire.forms.create-post');
    }
}
