<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Login(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email' , $request->email)->first();
        if(!$user ||!Hash::check($request->password , $user->password)){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        else{
            $token = $user->createToken('loginToken')->plainTextToken;
            return response()->json(['token' => $token], 200);
        }
    }

    public function Logout(Request $request)
    {
        if($request->user){

            $request->user()->tokens()->delete();
            return response()->json(['message' => 'Logged out'] , 200);
        }
        else{
            return response()->json(['message' => 'Unauthorized'], 401);
        }


    }
}
