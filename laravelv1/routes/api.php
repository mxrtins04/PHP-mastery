<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

Route::get('/hello/{name}', function ($name){
    return response()->json(['message' => "Hello, $name"]);
});

Route::get('/users/{id}', [UserController::class, 'show']);