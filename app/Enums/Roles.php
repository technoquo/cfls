<?php 

namespace App\Enums;

enum Roles: string
{
    case ADMIN = 'admin';
    case USER = 'user';
    case EDITOR = 'editor';
    case VIEWER = 'viewer';
}

