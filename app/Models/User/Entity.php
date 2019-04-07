<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entity extends Model
{
    const ID                = 'id';
    const EMAIL             = 'email';
    const PASSWORD          = 'password';
    const USER_ROLE         = 'user_role';

    protected $table = 'users';

    protected $visible = [
        self::ID,
        self::EMAIL,
        self::PASSWORD,
        self::USER_ROLE,
    ];

    protected $public = [
        self::ID,
        self::EMAIL,
        self::USER_ROLE,
    ];

    protected $fillable = [
        self::EMAIL,
        self::PASSWORD,
        self::USER_ROLE,
    ];

//    protected $defaults = [
//        self::ROLE      => Role::USER,
//    ];
}
