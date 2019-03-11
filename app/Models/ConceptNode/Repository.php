<?php

namespace App\Models\ConceptNode;

use App\Models\User;

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

    public function fetchByUser(User\Entity $user)
    {
        $conceptNodes = Entity::all();
        $results = [];
        foreach ($conceptNodes as $conceptNode)
        {
            if($conceptNode[Entity::USER_ID] == $user->getAttribute(User\Entity::ID))
            {
                $results[] = $conceptNode;
            }
        }
        return $results;
    }
}
