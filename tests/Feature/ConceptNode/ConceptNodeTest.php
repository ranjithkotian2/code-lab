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

class ConceptNodeTest extends TestCase
{
    public function testConceptNodeViewTest()
    {
        $response = $this->get('/concept_nodes/view/{id}');

        $response->assertStatus(200);
    }
    public function testConceptNodeTest()
    {
        $response = $this->get('concept_nodes');

        $response->assertStatus(200);
    }
    public function testConceptNodeCreateViewTest()
    {
        $response = $this->get('concept_nodes/create_view');

        $response->assertStatus(200);
    }
    public function testConceptNodeCreateTest()
    {
        $response = $this->get('concept_nodes/create');

        $response->assertStatus(200);
    }
    public function testConceptNodeCreateFromViewTest()
    {
        $response = $this->get('concept_nodes/create_from_view');

        $response->assertStatus(200);
    }
    public function testConceptNodeUserTest()
    {
        $response = $this->get('concept_nodes/user/added_view');

        $response->assertStatus(200);
    }
    public function testEditConceptNodeTest()
    {
        $response = $this->get('concept_nodes/edit_concept_node_view/{id}');

        $response->assertStatus(200);
    }
    public function testEditFromViewTest()
    {
        $response = $this->get('concept_nodes/edit_from_view/{id}');

        $response->assertStatus(200);
    }
    public function testSearchUserTest()
    {
        $response = $this->get('concept_nodes/search/user');

        $response->assertStatus(200);
    }
    public function testSearchKeywordTest()
    {
        $response = $this->get('concept_nodes/search/{keyword}');

        $response->assertStatus(200);
    }
    public function testSearchTest()
    {
        $response = $this->get('concept_nodes/search/');

        $response->assertStatus(200);
    }
    public function testConceptNodeIdTest()
    {
        $response = $this->get('concept_nodes/{id}');

        $response->assertStatus(200);
    }

}
