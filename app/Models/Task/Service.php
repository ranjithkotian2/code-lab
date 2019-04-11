<?php

namespace App\Models\Task;


class Service
{
    protected $entityRepo;

    public function __construct()
    {
        $this->entityRepo = new Repository();
    }

    public function fetchAll(): array
    {
        $entities = $this->entityRepo->fetchAll();

        return $entities->toArray();
    }

    public function fetch(string $id): Entity
    {
        $entity = $this->entityRepo->fetch($id);

        return $entity;
    }

    public function create(array $input)
    {
        $entity = new Entity();

        $entity->fill($input);

        $this->entityRepo->create($entity);

        return $entity;
    }

    public function fetchForConceptNode(string $conceptNodeId)
    {
        $entities = [];

        $all = $this->fetchAll();

        foreach ($all as $entity)
        {
            if($entity[Entity::CONCEPT_NODE_ID] === $conceptNodeId)
            {
                $entities[] = $entity;
            }
        }
        return $entities;
    }
}
