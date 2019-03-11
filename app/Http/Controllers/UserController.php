<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use View;
use Request;

use App\Models\User;

class UserController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new User\Service();
    }

    public function create()
    {
        $input = Request::all();

        $data = $this->service->create($input);

        session_start();
        $_SESSION["auth"] = true;
        $_SESSION["id"] = $data[User\Entity::ID];

        return response()->json($data);
    }

    public function check()
    {
        $input = Request::all();

        $this->service->verify($input);
    }

    public function logout()
    {
        session_start();
        session_destroy();
    }
}
