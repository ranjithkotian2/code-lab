<?php

namespace App\Models\ConceptNode;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;

class Entity extends Model
{
    use SoftDeletes;

    const ID                = 'id';
    const USER_ID           = 'user_id';
    const NAME              = 'name';
    const DESCRIPTION       = 'description';
    const PROBLEM_STATEMENT = 'problem_statement';
    const VIDEO_URL         = 'video_url';
    const TEST_CASES        = 'test_cases';
    const TYPE              = 'type';
    const PROVIDED_CODE     = 'provided_code';
    const EXPECTED_OUTPUT   = 'expected_output';
    const CREATED_AT        = 'created_at';
    const UPDATED_AT        = 'updated_at';
    const DELETED_AT        = 'deleted_at';

    protected $table = 'concept_nodes';

    protected $visible = [
        self::ID,
        self::USER_ID,
        self::NAME,
        self::DESCRIPTION,
        self::PROBLEM_STATEMENT,
        self::VIDEO_URL,
        self::TEST_CASES,
        self::TYPE,
        self::PROVIDED_CODE,
        self::EXPECTED_OUTPUT,
        self::CREATED_AT,
        self::UPDATED_AT,
    ];

    protected $public = [
        self::ID,
        self::USER_ID,
        self::NAME,
        self::DESCRIPTION,
        self::PROBLEM_STATEMENT,
        self::VIDEO_URL,
        self::TEST_CASES,
        self::TYPE,
        self::PROVIDED_CODE,
        self::EXPECTED_OUTPUT,
        self::CREATED_AT,
        self::UPDATED_AT,
    ];

    protected $fillable = [
        self::NAME,
        self::DESCRIPTION,
        self::PROBLEM_STATEMENT,
        self::VIDEO_URL,
        self::TEST_CASES,
        self::TYPE,
        self::PROVIDED_CODE,
        self::EXPECTED_OUTPUT,
    ];

    protected $defaults = [
        self::PROBLEM_STATEMENT => null,
        self::DESCRIPTION => null,
        self::VIDEO_URL => null,
        self::TEST_CASES => null,
        self::TYPE => null,
        self::PROVIDED_CODE => null,
        self::EXPECTED_OUTPUT => null,
    ];

    public function user()
    {
        return $this->belongsTo(User\Entity::class);
    }
}
