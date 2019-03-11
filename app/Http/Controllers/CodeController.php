<?php

namespace App\Http\Controllers;

use Request;

use App\Models\Code;

class CodeController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new Code\Service();
    }

    public function test()
    {
        $input = Request::all();

        $data = $this->service->test($input);

        return response()->json($data);
    }
}
