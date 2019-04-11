<?php

namespace App\Models\Task;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entity extends Model
{
    use SoftDeletes;

    const ID                = 'id';
    const CONCEPT_NODE_ID   = 'concept_node_id';
    const PROBLEM_STATEMENT = 'problem_statement';
    const DESCRIPTION       = 'description';
    const TEST_CASES        = 'test_cases';
    const PROVIDED_CODE     = 'provided_code';
    const EXPECTED_OUTPUT   = 'expected_output';
    const DEFAULT_CODE      = 'default_code';
    const CREATED_AT        = 'created_at';
    const UPDATED_AT        = 'updated_at';
    const DELETED_AT        = 'deleted_at';

    protected $table = 'tasks';

    protected $visible = [
        self::ID,
        self::CONCEPT_NODE_ID,
        self::PROBLEM_STATEMENT,
        self::DESCRIPTION,
        self::TEST_CASES,
        self::PROVIDED_CODE,
        self::EXPECTED_OUTPUT,
        self::CREATED_AT,
        self::UPDATED_AT,
        self::DEFAULT_CODE,
    ];

    protected $public = [
        self::ID,
        self::CONCEPT_NODE_ID,
        self::PROBLEM_STATEMENT,
        self::DESCRIPTION,
        self::TEST_CASES,
        self::PROVIDED_CODE,
        self::EXPECTED_OUTPUT,
        self::CREATED_AT,
        self::UPDATED_AT,
        self::DEFAULT_CODE,
    ];

    protected $fillable = [
        self::CONCEPT_NODE_ID,
        self::PROBLEM_STATEMENT,
        self::DESCRIPTION,
        self::TEST_CASES,
        self::PROVIDED_CODE,
        self::EXPECTED_OUTPUT,
        self::DEFAULT_CODE,
    ];

    protected $defaults = [
        self::CONCEPT_NODE_ID => null,
        self::PROBLEM_STATEMENT => null,
        self::DESCRIPTION => null,
        self::TEST_CASES => null,
        self::PROVIDED_CODE => null,
        self::EXPECTED_OUTPUT => null,
        self::DEFAULT_CODE => null,
    ];
}
