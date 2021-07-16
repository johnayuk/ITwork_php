<?php

namespace App\Controllers;

use Illuminate\Http\Request;
// use JWTAuth;
use Validator;
use App\User;
use App\Http\Requests\RegisterAuthRequest;
use App\Requests\UserRequest;
use Illuminate\Auth\Events\Logout;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Middleware\FrameGuard;
use Illuminate\Support\Facades\Auth;

class AuthController
{

    // public function __construct()
    // {
    //     $this->middleware('auth:api',['except'=>['login']]);
    // }

    public $token = true;


    public function register(UserRequest $request)
    {
     $validated = $request->validated();
 
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        if ($this->token) {
        return $this->login($request);
        }
        return response()->json([
        'success' => true,
        'data' => $user
        ], Response::HTTP_OK);
    }


    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $jwt_token = null;
        if (!$jwt_token = JWTAuth::attempt($input)) {
        return response()->json([
        'success' => false,
        'message' => 'Invalid email or Password',
        ], Response::HTTP_UNAUTHORIZED);
        }
        return response()->json([
        'success' => true,
        'token' => $jwt_token,
        ]); 
    }



    public function me() {
try {
    $user = auth()->user();
} catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
    return back()->withError($e->getMessage());
}
        return response()->json($user);
    }

    public function logout() {
        auth()->logout();
        // Auth::logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

}
