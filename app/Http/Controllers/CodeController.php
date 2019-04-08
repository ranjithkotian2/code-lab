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

    public function test(string $id)
    {
        $input = Request::all();

        $data = $this->service->test($input, $id);

        return response()->json($data);
    }

    public function submit(string $id)
    {
        $input = Request::all();

        $data = $this->service->submit($input, $id);

        return response()->json($data);
    }
}
