<?php

namespace App\Models\ConceptNode;

class Service
{
    protected $entityRepo;

    public function __construct()
    {
        $this->entityRepo = new Repository();
    }

    public function fetchConceptNodes(): array
    {
        $conceptNodes = $this->entityRepo->fetchAll();

        return $conceptNodes->toArray();
    }

    public function fetchConceptNode(string $id): Entity
    {
        $conceptNode = $this->entityRepo->fetch($id);

        return $conceptNode;
    }

    public function create(array $input)
    {
        $conceptNode = new Entity();
        $conceptNode->fill($input);
        $this->entityRepo->create($conceptNode);
        return $conceptNode;
    }

    public function getPayload(): array
    {
        $conceptNodes = $this->fetchConceptNodes();
        $conceptNodes = $this->getViewSerialized($conceptNodes);
        $payload['data']['concept_nodes'] = $conceptNodes;
        return $payload;
    }

    public function searchConceptNodes($keyword)
    {
        $conceptNodes = $this->fetchConceptNodes();
        $result = [];
        foreach ($conceptNodes as $conceptNode)
        {
            if(stripos($conceptNode[Entity::NAME], $keyword) !== false)
            {
                $result[] = $conceptNode;
            }
        }
        return $result;
    }

    protected function getViewSerialized(array $conceptNodes)
    {
        $result = [];
        foreach ($conceptNodes as $conceptNode)
        {
            $result[] = [Entity::NAME => $conceptNode[Entity::NAME],
                         Entity::ID => $conceptNode[Entity::ID],
                        ];
        }
        return $result;
    }
}
