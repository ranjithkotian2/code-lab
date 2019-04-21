<?php

namespace App\Models\TaskSubmission;


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

    public function create(Entity $conceptNodeSubmission)
    {
        $conceptNodeSubmission->saveOrFail();
    }

    public function update(Entity $conceptNode)
    {
        $conceptNode->saveOrFail();
    }
}
