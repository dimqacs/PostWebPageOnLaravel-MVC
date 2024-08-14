<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case SHOW_POSTS = 'show posts';
    case CREATE_POSTS = 'create posts';
    case EDIT_POSTS = 'edit posts';
    case DELETE_POSTS = 'delete posts';
    case MANAGE_ROLES = 'manage roles';
}
