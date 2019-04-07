<?php

namespace App\Models\User;


class Role
{
    const USER       = 'user';
    const SUPER_USER = 'super_user';
    const ADMIN      = 'admin';

    public static function isRoleValid($status) : bool
    {
        $key = __CLASS__ . '::' . strtoupper($status);

        return ((defined($key) === true) and (constant($key) === $status));
    }
}
