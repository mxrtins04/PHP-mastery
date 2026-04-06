<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    public function show(int $id): JsonResponse{
        return response()->json(["id" => $id, "Name" => "Mxr"]);
    }

    public function store(CreateUserRequest $request): JsonResponse{
        $name  = $request->input('name');
        $email = $request->input('email');
        $age   = $request->input('age');

        return response()->json([
            'message' => 'User created',
            'user'    => compact('name', 'email', 'age')
        ], 201);


    }
}
