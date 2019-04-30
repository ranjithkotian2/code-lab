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

class CodeTest extends TestCase
{
    public function testCode1Test()
    {
        $response = $this->get('code/test/{nodeId}');

        $response->assertStatus(200);
    }
    public function testCodeSubmitTest()
    {
        $response = $this->get('code/submit/{nodeId}');

        $response->assertStatus(200);
    }

}
