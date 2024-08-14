<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use App\Services\RoleService;

class BaseController extends Controller
{
    protected PostService $postService;

    protected RoleService $roleService;

    public function __construct(PostService $postService, RoleService $roleService)
    {
        $this->postService = $postService;

        $this->roleService = $roleService;
    }

}
