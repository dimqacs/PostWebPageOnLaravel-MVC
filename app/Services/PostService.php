<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function store($data): void
    {
        $tags = $data['tags'] ?? [];
        unset($data['tags']);

        $post = new Post($data);
        $post->save();

        $post->tags()->attach($tags);
    }

    public function update($post, $data): Post
    {
        $tags = $data['tags'] ?? [];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return $post;
    }
}
