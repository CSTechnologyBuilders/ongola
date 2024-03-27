<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;

class LoginController extends Controller
{
    public function login(Request $request) {
        $user=$this->validate($Request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        
         if(!Auth::attemp($user)){
            return response()->json([
                'error'=>['message'=>'you entered an invalid mail an password']
            ]);
         }
        
         $user= Auth::user();

         $token=Auth()->user()->createToken('laravel_reactnative_login')->plainTextToken;

         return response()->json([
            'user'=>$user,
            'token'=>$token,
         ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([
            'message'=>'logged out'
        ]);
    }
}
