<?php

namespace App\Models\ConceptNodeSubmission;

use App\Models\User;

class Service
{
    protected $entityRepo;

    public function __construct()
    {
        $this->entityRepo = new Repository();
    }

    public function fetchConceptNodeSubmissions(): array
    {
        $conceptNodeSubmissions = $this->entityRepo->fetchAll();

        return $conceptNodeSubmissions->toArray();
    }

    public function fetchConceptNodeSubmission(string $id): Entity
    {
        $conceptNodeSubmission = $this->entityRepo->fetch($id);

        return $conceptNodeSubmission;
    }

    public function create(array $input)
    {
        $conceptNodeSubmission = new Entity();
        $user = $this->getUserFromSession();
        $conceptNodeSubmission->user()->associate($user);
        $conceptNodeSubmission->fill($input);
        $this->entityRepo->create($conceptNodeSubmission);
        return $conceptNodeSubmission;
    }

    protected function getUserFromSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userId = $_SESSION['id'];
        return (new User\Service())->fetch($userId);
    }

    public function isUserCompleted(string $conceptNodeId): bool
    {
        $conceptNodeSubmissions = $this->fetchConceptNodeSubmissions();
        foreach ($conceptNodeSubmissions as $conceptNodeSubmission)
        {
            if(($conceptNodeSubmission[Entity::CONCEPT_NODE_ID] == $conceptNodeId) and $_SESSION['id'] == $conceptNodeSubmission[Entity::USER_ID])
            {
                return $conceptNodeSubmission[Entity::COMPLETED];
            }

        }

        return false;
    }
}
