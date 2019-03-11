<?php

namespace App\Models\User;

use Exception;

class Service
{
    protected $entityRepo;

    public function __construct()
    {
        $this->entityRepo = new Repository();
    }

    public function create(array $input)
    {
        $entity = new Entity();
        $entity->fill($input);
        $this->entityRepo->create($entity);
        return $entity;
    }

    public function verify(array $input)
    {
        try{
            $user = $this->entityRepo->fetchByEmail($input[Entity::EMAIL]);
            if($user[Entity::PASSWORD] !== $input[Entity::PASSWORD]){
                throw new Exception();
            }
            session_start();
            $_SESSION["auth"] = true;
            $_SESSION[Entity::ID] = $user[Entity::ID];
        }
        catch (\Exception $e)
        {
            throw new Exception("not authorized", 404);
        }

    }

    public function fetchConceptNodes(): array
    {
        $entities = $this->entityRepo->fetchAll();

        return $entities->toArray();
    }

    public function fetchConceptNode(string $id)
    {
        $entity = $this->entityRepo->fetch($id);

        return $entity;
    }
}
