<?php

namespace App\Livewire\Pages;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PostCommentsPage extends Component
{
    public Post $post;
    public $comments;

    #[Validate('required|min:5')]
    public string $comment = "";
 
    public function mount(Post $post) 
    {
        $this->post = $post;
        $this->loadComments();
        $this->post->increment("views");
    }

    public function loadComments()
    {
        $this->comments = $this->post
            ->comments()
            ->with('user') // Avoid N+1 queries
            ->latest()
            ->get()
            ->toArray();
    }

    public function storeComment()
    {
        $this->post->comments()->create([
            'content' => $this->comment,
            'user_id' => Auth::id(),
        ]);

        $this->loadComments();
    }

    #[Layout('layouts.app')] 
    public function render()
    {
        return view("livewire.pages.post");
    }
}