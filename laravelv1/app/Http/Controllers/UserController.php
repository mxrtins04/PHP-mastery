<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(int $id): JsonResponse{
        return response()->json(["id" => $id, "Name" => "Mxr"]);
    }
}
