<?php

namespace App\Http\Controllers;

use View;
use Request;

use App\Models\Task;
use App\Models\ConceptNode;
use App\Models\Dependencies;
use App\Models\ConceptNodeSubmission;

class ConceptNodeController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new ConceptNode\Service();
    }

    public function fetchConceptNodes()
    {
    	$data = $this->service->fetchConceptNodes();

        return response()->json($data);
    }

    public function fetchConceptNode(string $id)
    {
        $data = $this->service->fetchConceptNode($id);

        return response()->json($data);
    }

    public function create()
    {
        $input = Request::all();

        $data = $this->service->create($input);

        return response()->json($data);
    }

    public function createFromView()
    {
        $this->create();

        return (new UserController())->getProfileView();
    }

    public function getSearchPage()
    {
        $payload = $this->service->getPayload();
        return View::make('home', $payload);
    }

    public function fetchConceptNodeView($id)
    {
        return View::make('concept_node', ['data' => 'hey hey hello']);
    }

    public function searchConceptNodes($keyword)
    {
        $data = $this->service->searchConceptNodes($keyword);

        return response()->json($data);
    }

    public function getCreateView()
    {
        return View::make('add_concept_node', []);
    }

    public function getConceptNodeView(string $id)
    {
        $payload = ['data' => $this->service->fetchConceptNode($id)];

        $dependencies = (new Dependencies\Service())->getAllDependencyNotCompleted($id);

        if(empty($dependencies) == false)
        {
            return View::make('dependency_not_covered', ["dep" => $dependencies]);
        }

        $conceptNodeSubmission = (new ConceptNodeSubmission\Service())->
            fetchOrCreateConceptNodeSubmissionByUserIdAndConceptNodeId($id);

        $payload['conceptNodeSubmission'] = $conceptNodeSubmission;

        $payload['tasks'] = (new Task\Service())->fetchForConceptNode($id);

        return View::make('concept_node', $payload);
    }

    public function getAddedView()
    {
        return View::make('added_concept_nodes');
    }

    public function searchConceptNodesByUser()
    {
        $data = $this->service->searchConceptNodesByUser();

        return response()->json($data);
    }

    public function getEditConceptNodeView(string $id)
    {
        $payload = ['data' => $this->service->fetchConceptNode($id)];

        return View::make('edit_concept_node', $payload);
    }

    public function editConceptNodeFromView(string $id)
    {
        $input = Request::all();

        $data = $this->service->update($input, $id);

        return view::make('profile', []);
    }
}
