<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\BaseController;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class ShowController extends BaseController
{

    public function __invoke(Post $post): View
    {
        return view('admin.post.show', compact('post'));
    }
}
