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

        $input[Entity::USER_ROLE] = Role::USER;

        $entity->fill($input);

        $this->entityRepo->create($entity);

        return $entity;
    }

    public function getUser(string $id)
    {
        $user = $this->entityRepo->fetch($id);

        return $user->toArray();
    }

    public function verify(array $input)
    {
        try{
            $user = $this->entityRepo->fetchByEmail($input[Entity::EMAIL]);
            if(($user === null) or ($user[Entity::PASSWORD] !== $input[Entity::PASSWORD])){
                throw new Exception();
            }
            session_start();
            $_SESSION["auth"] = true;
            $_SESSION[Entity::ID] = $user[Entity::ID];
            $_SESSION[Entity::USER_ROLE] = $user[Entity::USER_ROLE];
        }
        catch (\Exception $e)
        {
            throw new Exception("not authorized", 404);
        }

    }

    public function fetch(string $id)
    {
        $entity = $this->entityRepo->fetch($id);

        return $entity;
    }
}
