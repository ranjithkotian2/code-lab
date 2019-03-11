<?php

namespace App\Models\ConceptNode;


class Repository
{
    protected $table = 'concept_nodes';

    public function fetchAll()
    {
        $results = Entity::all();
        return $results;
    }

    public function fetch(string $id): Entity
    {
        $results = Entity::find($id);
        return $results;
    }

    public function create(Entity $conceptNode)
    {
        $conceptNode->saveOrFail();
    }
}
