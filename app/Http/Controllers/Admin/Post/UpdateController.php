<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{

    public function __invoke(PostUpdateRequest $request, Post $post): RedirectResponse
    {
        $updatedPost = $this->postService->update($post, $request->validated());

        return redirect()->route('admin.post.show', $updatedPost->id);
    }
}
