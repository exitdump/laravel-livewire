<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;

class PostService
{

    /**
     * Get all posts.
     *
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllPosts($columns = ['*'])
    {
        return Post::with('user') // Eager load user relationships
            ->latest() // Order by latest posts
            ->get($columns); // Fetch only specified columns
    }
    
    /**
     * Get all posts for a given user.
     *
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPostsBy(User $user, $columns = ['*'])
    {
        return $user->posts()
            ->with(['user', 'likes'])
            ->latest()
            ->get($columns); 
    }

    /**
     * Create a new post for a user.
     *
     * @param User $user
     * @param array $data
     * @return \App\Models\Post
     */
    public function createPost(User $user, array $data)
    {
        return $user->posts()->create([
            'content' => $data['content'],
        ]);
    }

    /**
     * Get the details of a single post.
     *
     * @param Post $post
     * @return Post
     */
    public function getPostById(Post $post)
    {
        return $post;
    }

    /**
     * Delete a post.
     *
     * @param Post $post
     * @return bool|null
     */
    public function deletePost(Post $post)
    {
        return $post->delete();
    }

    /**
     * Update the content of a post.
     *
     * @param Post $post
     * @param array $data
     * @return Post
     */
    public function updatePost(Post $post, array $data)
    {
        $post->update([
            'content' => $data['content'],
        ]);

        return $post;
    }
}
