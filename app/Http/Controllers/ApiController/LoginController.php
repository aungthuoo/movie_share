<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;
use App\Models\User;
use App\Models\Comment;
use App\Http\Resources\MovieCollection;
use App\Http\Resources\MovieResource;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{



/**
     * Register
     *
     * This endpoint is used to register a user to the system.
     *
     * @bodyParam name string required Example: admin
     * @bodyParam email string required Example: admin@gmail.com
     * @bodyParam password string required Example: 123456
     *
     * @response scenario="User Login Successfully" {
     * "message": "Register successfully.",
     * "access_token": "",
     * "token_type": "Bearer"
     * }
     *
     * @response 401 scenario="Failed Login"{
     * "message": "Invalid login credentials"
     * }
     * 
     * @response 200 scenario="Already register"{
     * "message": "Already registered."
     * }
     *
     */
    public function register(Request $request)
    {
        //$otpCode = rand(100000, 999999);

        $user = User::where('email', '=', $request->email)
            ->first();

            
        if( $user ){
           return response()->json([
               'status' => false,
               'user' => $user,
               'message' => 'Already registered.'
           ], 200);
        }

       $customer = User::create([
           'name'              => $request->name,
           'email'             => $request->email,
           'password'          => Hash::make($request->password),
           //'otp_code'          => $otpCode,
           'account_id'        => 1
       ]);

       return response()->json([
           'status' => true,
           'message' => 'Register successfully.'
           //'user' => $customer
       ], 200);
       
    }

/**
     * Login
     *
     * This endpoint is used to login a user to the system.
     *
     * @bodyParam email string required Example: admin@gmail.com
     * @bodyParam password string required Example: 123456
     *
     * @response scenario="User Login Successfully" {
     * "message": "User Login Successfully",
     * "access_token": "",
     * "token_type": "Bearer"
     * }
     *
     * @response 401 scenario="Failed Login"{
     * "message": "Invalid login credentials"
     * }
     *
     */
    public function login( Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $token =  $user->createToken('CodeTest')->accessToken;

            return response()->json([
                'status' => true,
                'token' => $token,
                'message' => "User Login Successfully", 
                
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User does not exist'
            ], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
