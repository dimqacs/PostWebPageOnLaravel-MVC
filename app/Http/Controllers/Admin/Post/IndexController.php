<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Post;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\View;

class IndexController extends BaseController
{
    /**
     * @throws BindingResolutionException
     */
    public function __invoke(FilterRequest $request): View
    {
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($request->validated())]);

        $posts = Post::filter($filter)->paginate(25);

        $postsCount = Post::all()->count();

        return view('admin.post.index', compact('posts', 'postsCount'));
    }
}
