<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entity extends Model
{
    const ID                = 'id';
    const EMAIL             = 'email';
    const PASSWORD          = 'password';

    protected $table = 'users';

    protected $visible = [
        self::ID,
        self::EMAIL,
        self::PASSWORD
    ];

    protected $public = [
        self::ID,
        self::EMAIL,
    ];

    protected $fillable = [
        self::EMAIL,
        self::PASSWORD,
    ];
}
