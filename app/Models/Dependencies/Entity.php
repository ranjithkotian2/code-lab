<?php

namespace App\Models\Dependencies;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\ConceptNode;

class Entity extends Model
{
    use SoftDeletes;

    const ID                    = 'id';
    const CONCEPT_NODE_ID       = 'concept_node_id';
    const DEPENDENCY_NODE_ID    = 'dependency_node_id';

    protected $table = 'dependency';

    protected $visible = [
        self::ID,
        self::CREATED_AT,
        self::UPDATED_AT,
    ];

    protected $public = [
        self::ID,
        self::CREATED_AT,
        self::UPDATED_AT,
    ];

    protected $fillable = [
        self::CONCEPT_NODE_ID,
    ];

    protected $defaults = [
    ];

    public function ConceptNode()
    {
        return $this->belongsTo(ConceptNode\Entity::class);
    }

    public function DependencyNode()
    {
        return $this->belongsTo(ConceptNode\Entity::class);
    }
}
