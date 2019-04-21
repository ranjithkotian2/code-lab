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

            $this->startSession();

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

    public function promoteToAdmin(string $email)
    {
        $user = $this->entityRepo->fetchByEmail($email);

        $user->setUserRole(Role::ADMIN);

        $user->saveOrFail();
    }

    public function promoteToSuperUser(string $email)
    {
        $user = $this->entityRepo->fetchByEmail($email);

        if($user->getUserRole() !== Role::ADMIN)
        {
            $user->setUserRole(Role::SUPER_USER);

            $user->saveOrFail();
        }
    }

    private function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
}
