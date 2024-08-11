<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\BaseController;
use App\Http\Requests\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, Post $post): RedirectResponse
    {
        $updatedPost = $this->service->update($post, $request->validated());

        return redirect()->route('admin.post.show', $updatedPost->id);
    }
}
