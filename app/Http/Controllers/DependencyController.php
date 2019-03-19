<?php

namespace App\Http\Controllers;

use View;
use Request;

use App\Models\ConceptNode;
use App\Models\Dependencies;

class DependencyController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new Dependencies\Service();
    }

    public function getAddDependencyView(string $id)
    {
        $conceptNode = (new ConceptNode\Service())->fetchConceptNode($id);
        return View::make('add_dependency', ['id' => $id, 'conceptNode' => $conceptNode]);
    }

    public function addDependency(string $id, string $dependencyId)
    {
        $data = $this->service->create($id, $dependencyId);

        return response()->json($data);
    }

}
