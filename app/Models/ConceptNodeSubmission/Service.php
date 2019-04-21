<?php

namespace App\Models\ConceptNodeSubmission;

use App\Models\Task;
use App\Models\User;
use App\Models\ConceptNode;
use App\Models\TaskSubmission;

class Service
{
    protected $entityRepo;

    public function __construct()
    {
        $this->entityRepo = new Repository();

        $this->startSession();
    }

    public function fetchConceptNodeSubmissions(): array
    {
        $conceptNodeSubmissions = $this->entityRepo->fetchAll();

        return $conceptNodeSubmissions->toArray();
    }

    public function fetchOrCreateConceptNodeSubmissionByUserIdAndConceptNodeId(string $conceptNodeId)
    {
        $conceptNodeSubmissions = $this->entityRepo->fetchAll();

        $userId = $this->getUserIdFromSession();

        foreach ($conceptNodeSubmissions as $sub)
        {
            if (($sub[Entity::USER_ID] == $userId) and
                ($sub[Entity::CONCEPT_NODE_ID] == $conceptNodeId))
            {
                return $sub;
            }
        }

        $input = [];
        $input[Entity::CONCEPT_NODE_ID] = $conceptNodeId;
        $input[Entity::COMPLETED] = false;

        $conceptNode = (new ConceptNode\Service())->fetchConceptNode($conceptNodeId);
        $input[Entity::CODE] = $conceptNode[ConceptNode\Entity::DEFAULT_CODE];
        if($conceptNode[ConceptNode\Entity::DEFAULT_CODE] === null)
        {
            $input[Entity::CODE] = "// write your code here";
        }

        return $this->create($input);
    }

    public function fetchOrCreateConceptNodeSubmissionByUserIdAndTaskId(string $conceptNodeId)
    {
        $conceptNodeSubmissions = $this->entityRepo->fetchAll();

        $userId = $this->getUserIdFromSession();

        foreach ($conceptNodeSubmissions as $sub)
        {
            if (($sub[Entity::USER_ID] == $userId) and
                ($sub[Entity::CONCEPT_NODE_ID] == $conceptNodeId))
            {
                return $sub;
            }
        }

        $input = [];
        $input[Entity::CONCEPT_NODE_ID] = $conceptNodeId;
        $input[Entity::COMPLETED] = false;

        $conceptNode = (new Task\Service())->fetch($conceptNodeId);
        $input[Entity::CODE] = $conceptNode[ConceptNode\Entity::DEFAULT_CODE];
        if($conceptNode[ConceptNode\Entity::DEFAULT_CODE] === null)
        {
            $input[Entity::CODE] = "// write your code here";
        }

        return $this->create($input);
    }

    public function checkConceptNodeCompleted(string $conceptNodeId)
    {
        $conceptNodeSubmission = $this->fetchOrCreateConceptNodeSubmissionByUserIdAndConceptNodeId($conceptNodeId);

        $tasks = (new Task\Service())->fetchForConceptNode($conceptNodeId);

        $completed = true;

        foreach ($tasks as $task)
        {
            $taskSubmission = (new TaskSubmission\Service())->fetchOrCreateConceptNodeSubmissionByUserIdAndTaskId($task['id']);

            if($taskSubmission[TaskSubmission\Entity::COMPLETED] != true)
            {
                $completed = false;
            }
        }

        $conceptNodeSubmission->setAttribute(Entity::COMPLETED, $completed);

        $conceptNodeSubmission->saveOrFail();

        return $conceptNodeSubmission;
    }

    public function updateCodeOfSubmission(string $code, string $conceptNodeId)
    {
        $conceptNodeSubmission = $this->fetchOrCreateConceptNodeSubmissionByUserIdAndConceptNodeId($conceptNodeId);

        $conceptNodeSubmission->setCode($code);

        $conceptNodeSubmission->saveOrFail();

        return $conceptNodeSubmission;
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

    protected function getUserIdFromSession()
    {
        return $_SESSION['id'];
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

    private function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
}
