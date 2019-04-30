<?php
/**
 * Created by PhpStorm.
 * User: ranjith
 * Date: 2019-04-13
 * Time: 16:22
 */

namespace Tests\Feature\User;


use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    public function testUserTest()
    {
        $response = $this->get('user');

        $response->assertStatus(200);
    }

    public function testUserLoginTest()
    {
        $response = $this->get('user/login');

        $response->assertStatus(200);
    }

    public function testUserLogoutTest()
    {
        $response = $this->get('user/logout');

        $response->assertStatus(200);
    }

    public function testUserAdminTest()
    {
        $response = $this->get('user/promote_to_admin/{email}');

        $response->assertStatus(200);
    }

    public function testUserSuperuserTest()
    {
        $response = $this->get('user/promote_to_super_user/{email}');

        $response->assertStatus(200);
    }

}
