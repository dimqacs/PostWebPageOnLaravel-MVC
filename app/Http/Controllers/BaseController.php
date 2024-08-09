<?php

namespace App\Http\Controllers;

use App\Services\Post\Service;

class BaseController extends Controller
{
    protected Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

}
