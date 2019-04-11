<?php

namespace App\Models\Task;


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

    public function create(Entity $entity)
    {
        $entity->saveOrFail();
    }
}
