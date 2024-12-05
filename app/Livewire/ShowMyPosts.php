<?php

namespace App\Livewire;

use Livewire\Component;

class ShowMyPosts extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = auth()->user()->posts()->latest()->get();

    }
    public function render()
    {
        return view('livewire.show-my-posts');
    }
}
