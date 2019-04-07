<?php

namespace App\Models\User;


class Repository
{
    protected $table = 'users';

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

    public function fetchByEmail(string $email){ // todo
        $en = $this->fetchAll();
        foreach ($en as $e)
        {
            if($e[Entity::EMAIL] === $email){
                return $e;
            }
        }
        return null;
    }

    public function create(Entity $conceptNode)
    {
        $conceptNode->saveOrFail();
    }
}
