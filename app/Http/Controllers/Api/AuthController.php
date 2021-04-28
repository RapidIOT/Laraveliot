<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use Illuminate\Support\Facades\Hash;


// use JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login','register']]);
    }



    public function appUserRegistration(Request $request)
    {
        // return $request;
        // print_r($request);
        $newuser= User::create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'phone' => $request['phone'],
            'city' => $request['city'],
            'state' => $request['state'],
            'address' => $request['address'],
            'zipcode' => $request['zipcode'],
            'avatar' => $request['avatar'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if($newuser){

            logActivity($activityType="New User Registration from App",$deviceNumber="-",$deviceStatus="-",$pinId="-",$pinStatus="-",$details="New User Registration from Mobile app",$sharedControlWith="0");

            $data = array(
                "user"=>$newuser,
                "message" =>"New User created"
            );

            return response()->json(['success' => true,'data'=>$data],200);
        }else{
            $json = [
                'success' => false,
                'error' => [
                    'message' => "User not created please try again",
                ],
            ];
            return response()->json($json, 401);
        }
        
    }





    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // print_r($request);
        // return $request->header('username');
        // return "test";

        //return $request->all();
         $credentials = request(['email', 'password']);

        // if (! $token = auth()->attempt($credentials)) {
        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // return $token;
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        JWTAuth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(JWTAuth::refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
            'user'=>auth()->user()
        ]);
    }




    

}