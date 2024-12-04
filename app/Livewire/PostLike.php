<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostLike extends Component
{
    public Post $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function toggleLike()
    {
        $user = Auth::user();

        if ($this->post->isLikedBy( $user)) {
            // Unlike the post
            $this->post->likes()->where('user_id', $user->id)->delete();
        } else {
            // Like the post
            $this->post->likes()->create(['user_id' => $user->id]);
        }

        $this->post->load('likes'); // Refresh the likes relationship
    }
    public function render()
    {
        return view('livewire.post-like');
    }
}
