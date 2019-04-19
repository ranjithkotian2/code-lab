<?php

namespace App\Http\Controllers;

use View;
use Request;

use App\Models\Task;
use App\Models\ConceptNode;
use App\Models\ConceptNodeSubmission;

class TaskController
{
    protected $service;

    public function __construct()
    {
        $this->service = new Task\Service();
    }

    public function fetchAll()
    {
        $data = $this->service->fetchAll();

        return response()->json($data);
    }

    public function fetch(string $id)
    {
        $data = $this->service->fetch($id);

        return response()->json($data);
    }

    public function create()
    {
        $input = Request::all();

        $data = $this->service->create($input);

        return response()->json($data);
    }

    public function getAddTaskView(string $conceptNodeId)
    {
        $conceptNode = (new ConceptNode\Service())->fetchConceptNode($conceptNodeId);

        return View::make('add_task', ['conceptNode' => $conceptNode]);
    }

    public function createFromView($conceptNodeId)
    {
        $input = Request::all();

        $input[Task\Entity::CONCEPT_NODE_ID] = $conceptNodeId;

        $this->service->create($input);

        return (new UserController())->getProfileView();
    }

    public function getTasksForConceptNode($conceptNodeId)
    {
        $data = $this->service->fetchForConceptNode($conceptNodeId);

        return response()->json($data);
    }

    public function fetchView($id)
    {
        $data = $this->service->fetch($id);

        $conceptNodeSubmission = (new ConceptNodeSubmission\Service())->
        fetchOrCreateConceptNodeSubmissionByUserIdAndTaskId($id);

        return View::make('task', ['task' => $data, 'conceptNodeSubmission' => $conceptNodeSubmission]);
    }

    public function getAllTasksViewForConceptNode($conceptNodeId)
    {
        $tasks = $this->service->fetchForConceptNode($conceptNodeId);

        $conceptNode = (new ConceptNode\Service())->fetchConceptNode($conceptNodeId);

        return View::make(
            'all_tasks',
            [
                'tasks'       => $tasks,
                'conceptNode' => $conceptNode
            ]
        );
    }

    public function getEditView(string $id)
    {
        $task = $this->service->fetch($id);

        return View::make(
            'edit_task',
            [
                'task'       => $task,
            ]
        );
    }

    public function editFromView(string $id)
    {
        $input = Request::all();

        $data = $this->service->update($input, $id);

        return $this->getAllTasksViewForConceptNode($data['concept_node_id']);
    }
}
