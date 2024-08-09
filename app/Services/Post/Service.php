<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store($data): void
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $post = new Post($data);

        $post->tags()->attach($tags);
    }

    public function update($post, $data): Post
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return $post;
    }
}
