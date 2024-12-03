<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreatePost extends Component
{
    #[Validate('required')] 
    public string $content = '';

    public function storePost()
    {
        $this->validate(); 

        $post = Post::create([
            'content' => $this->content,
            'user_id' => auth()->id(), 
        ]);

        // Emit an event to update the post list
        $this->dispatch('post-created', postId: $post->id);

        // Clear the input field
        $this->content = '';
        
        session()->flash('success', 'Your post was successfully created.');
    }

    public function render()
    {
        return view('livewire.forms.create-post');
    }
}
