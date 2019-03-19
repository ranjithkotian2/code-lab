<?php

namespace App\Models\Dependencies;

use App\Models\ConceptNode;
use App\Models\ConceptNodeSubmission;

class Service
{
    protected $entityRepo;

    public function __construct()
    {
        $this->entityRepo = new Repository();
    }

    public function create($id, $dependencyId)
    {
        $node = (new ConceptNode\Repository())->fetch($id);
        $dNode = (new ConceptNode\Repository())->fetch($dependencyId);
        $dependency = new Entity();
        $dependency->ConceptNode()->associate($node);
        $dependency->DependencyNode()->associate($dNode);
        $this->entityRepo->create($dependency);
        return $dependency;
    }

    public function getAllDependency(string $concpetNodeId)
    {
        return $this->entityRepo->getAllDependencies($concpetNodeId);
    }

    public function getAllDependencyNotCompleted(string $concpetNodeId): array
    {
        $deps = $this->getAllDependency($concpetNodeId);
        $concSubService = new ConceptNodeSubmission\Service();

        $result = [];

        foreach ($deps as $dep)
        {
            if($concSubService->isUserCompleted($dep) == false){
                $result[] = $dep;
            }
        }

        return $result;
    }
}
