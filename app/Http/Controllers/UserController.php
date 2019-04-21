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

        $this->startSession();
    }

    public function create()
    {
        $input = Request::all();

        $data = $this->service->create($input);

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
        session_destroy();
    }

    public function getProfileView()
    {
        $user = $this->service->getUser($_SESSION["id"]);

        return view('profile', ['userRole' => $user[User\Entity::USER_ROLE]]);
    }

    public function promoteToAdmin(string $email)
    {
        $this->service->promoteToAdmin($email);
    }

    public function promoteToSuperUser($email)
    {
        $this->service->promoteToSuperUser($email);
    }

    private function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
}
