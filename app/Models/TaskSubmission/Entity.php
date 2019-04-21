<?php

namespace App\Models\TaskSubmission;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Entity extends Model
{
    const ID                = 'id';
    const USER_ID           = 'user_id';
    const TASK_ID           = 'task_id';
    const CODE              = 'code';
    const COMPLETED         = 'completed';
    const COMPLETED_AT      = 'completed_at';

    protected $table = 'task_submissions';

    protected $visible = [
        self::ID,
        self::USER_ID,
        self::TASK_ID,
        self::CODE,
        self::COMPLETED,

    ];

    protected $public = [
        self::ID,
        self::USER_ID,
        self::TASK_ID,
        self::CODE,
        self::COMPLETED,
    ];

    protected $fillable = [
        self::USER_ID,
        self::TASK_ID,
        self::CODE,
        self::COMPLETED,
    ];

    protected $defaults = [
        self::CODE => "",
        self::COMPLETED => false,
    ];

    public function user()
    {
        return $this->belongsTo(User\Entity::class);
    }

    public function setCode(string $code)
    {
        $this->setAttribute(self::CODE, $code);
    }

    public function markCompleted()
    {
        $this->setAttribute(self::COMPLETED, true);
    }
}
