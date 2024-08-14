<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case SHOW_POSTS = 'show posts';
    case ADD_POSTS = 'add posts';
    case EDIT_POSTS = 'edit posts';
    case DELETE_POSTS = 'delete posts';
}
