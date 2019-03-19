<?php

namespace App\Models\Dependencies;

class Repository
{
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

    public function create(Entity $dependency)
    {
        $dependency->saveOrFail();
    }

    public function getAllDependencies($conceptNodeId)
    {
        $all = $this->fetchAll();

        $result = [];

        foreach ($all as $dep)
        {
            if($dep[Entity::CONCEPT_NODE_ID] == $conceptNodeId)
            {
                $result[] = $dep[Entity::DEPENDENCY_NODE_ID];
            }
        }

        return $result;
    }
}
