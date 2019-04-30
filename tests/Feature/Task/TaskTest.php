<?php
/**
 * Created by PhpStorm.
 * User: ranjith
 * Date: 2019-04-13
 * Time: 16:19
 */

namespace Tests\Feature\Code;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    public function testTask1Test()
    {
        $response = $this->get('tasks');

        $response->assertStatus(200);
    }
    public function testTask2Test()
    {
        $response = $this->get('tasks');

        $response->assertStatus(200);
    }
    public function testConceptNodeTest()
    {
        $response = $this->get('task/concept_node/{concept_node_id}');

        $response->assertStatus(200);
    }
    public function testIdTest()
    {
        $response = $this->get('tasks/{id}');

        $response->assertStatus(200);
    }
    public function testAddTaskTest()
    {
        $response = $this->get('tasks/get_add_task_view/{conceptNodeId}');

        $response->assertStatus(200);
    }
    public function testCreateFromViewTest()
    {
        $response = $this->get('tasks/tasks/create_from_view/{conceptNodeId}');

        $response->assertStatus(200);
    }
    public function testGetViewTest()
    {
        $response = $this->get('tasks/{id}/get_view');

        $response->assertStatus(200);
    }


}
