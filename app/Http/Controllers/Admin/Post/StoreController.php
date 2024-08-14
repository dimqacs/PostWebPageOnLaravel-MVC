<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(PostStoreRequest $request): RedirectResponse
    {
        $this->postService->store($request->validated());

        return redirect()->route('admin.post.index');
    }
}
