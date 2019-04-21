<?php

namespace App\Models\TaskSubmission;

use App\Models\Task;
use App\Models\User;
use App\Models\ConceptNode;

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

    public function fetchOrCreateConceptNodeSubmissionByUserIdAndTaskId(string $taskId)
    {
        $conceptNodeSubmissions = $this->entityRepo->fetchAll();

        $userId = $this->getUserIdFromSession();

        foreach ($conceptNodeSubmissions as $sub)
        {
            if (($sub[Entity::USER_ID] == $userId) and
                ($sub[Entity::TASK_ID] == $taskId))
            {
                return $sub;
            }
        }

        $input = [];
        $input[Entity::TASK_ID] = $taskId;
        $input[Entity::COMPLETED] = false;

        $conceptNode = (new Task\Service())->fetch($taskId);
        $input[Entity::CODE] = $conceptNode[ConceptNode\Entity::DEFAULT_CODE];
        if($conceptNode[ConceptNode\Entity::DEFAULT_CODE] === null)
        {
            $input[Entity::CODE] = "// write your code here";
        }

        return $this->create($input);
    }

    public function updateCodeOfSubmission(string $code, string $conceptNodeId)
    {
        $taskSubmission = $this->fetchOrCreateConceptNodeSubmissionByUserIdAndTaskId($conceptNodeId);

        $taskSubmission->setCode($code);

        $taskSubmission->saveOrFail();

        return $taskSubmission;
    }

    public function fetchConceptNodeSubmission(string $id): Entity
    {
        $taskSubmission = $this->entityRepo->fetch($id);

        return $taskSubmission;
    }

    public function create(array $input)
    {
        $taskSubmission = new Entity();
        $user = $this->getUserFromSession();
        $taskSubmission->user()->associate($user);
        $taskSubmission->fill($input);
        $this->entityRepo->create($taskSubmission);
        return $taskSubmission;
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
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return $_SESSION['id'];
    }

    public function isUserCompleted(string $taskId): bool
    {
        $taskSubmissions = $this->fetchConceptNodeSubmissions();
        foreach ($taskSubmissions as $taskSubmission)
        {
            if(($taskSubmission[Entity::TASK_ID] == $taskId) and $_SESSION['id'] == $taskSubmission[Entity::USER_ID])
            {
                return $taskSubmission[Entity::COMPLETED];
            }

        }

        return false;
    }
}
