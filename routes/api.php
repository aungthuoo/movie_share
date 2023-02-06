<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



/**
     * Login
     *
     * This endpoint is used to login a user to the system.
     *
     * @bodyParam email string required Example: ian@gmail.com
     * @bodyParam password string required Example: 12345678
     *
     * @response scenario="Successful Login" {
     * "message": "User Login Successfully",
     * "access_token": "8|MgowQLkdpShwrb8AI9j1YAGmwnDjAOeE17XrP5nb",
     * "token_type": "Bearer"
     * }
     *
     * @response 401 scenario="Failed Login"{
     * "message": "Invalid login credentials"
     * }
     *
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
