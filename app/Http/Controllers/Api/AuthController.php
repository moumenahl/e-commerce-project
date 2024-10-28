<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name']  = $user->name;
        return response()->json(['data' => $success ,'message' => "registered successfully"] , 201);
    }

    public function login(LoginRequest $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name']  = $user->name;
            return response()->json(['data' => $success ,'message' => "logined successfully"] , 200);
        }
        else {
            return response()->json(['message' => "logined failed"] , 400);
        }
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        return response()->json( ["message"=>"logged out "] , 204);
    }
}
