<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckApiToken;

Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

Route::get('/hello/{name}', function ($name){
    return response()->json(['message' => "Hello, $name"]);
});

Route::get('/users/{id}', [UserController::class, 'show'])
    ->middleware(CheckApiToken::class);

Route::post('/users', [UserController::class, 'store']);