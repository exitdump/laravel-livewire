<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;

class PostService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllPosts()
    {
        return Post::all();
    }

    public function getAllPostsBy(User $user)
    {
        return Post::where("user_id", $user->id)->get();
    }
}
