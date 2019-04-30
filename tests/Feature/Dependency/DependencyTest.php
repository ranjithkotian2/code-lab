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

class DependencyTest extends TestCase
{
    public function testAddDependency1Test()
    {
        $response = $this->get('dependencies/get_add_dependency_view/{id}');

        $response->assertStatus(200);
    }
    public function testAddDependency2Test()
    {
        $response = $this->get('dependencies/get_add_dependency_view/{id}/{dependencyId}');

        $response->assertStatus(200);
    }
}
