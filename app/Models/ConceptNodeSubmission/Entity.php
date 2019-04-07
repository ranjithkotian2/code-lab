<?php

namespace App\Models\ConceptNodeSubmission;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Entity extends Model
{
    const ID                = 'id';
    const USER_ID           = 'user_id';
    const CONCEPT_NODE_ID   = 'concept_node_id';
    const CODE              = 'code';
    const COMPLETED         = 'completed';

    protected $table = 'concept_node_submissions';

    protected $visible = [
        self::ID,
        self::USER_ID,
        self::CONCEPT_NODE_ID,
        self::CODE,
        self::COMPLETED,
    ];

    protected $public = [
        self::ID,
        self::USER_ID,
        self::CONCEPT_NODE_ID,
        self::CODE,
        self::COMPLETED,
    ];

    protected $fillable = [
        self::USER_ID,
        self::CONCEPT_NODE_ID,
        self::CODE,
        self::COMPLETED,
    ];

    protected $defaults = [
        self::CODE => null,
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
