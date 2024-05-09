<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function register(Request $request){
        $input = [
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ];
        
        $user = User::create($input);

        return response()->json([
            'success' => true,
            'message' => 'register success',
            'data' => $user
        ], 201);
    }

    public function login(Request $request){
        $user = User::where('username', $request->username)->first();
        
        if(! $user || ! Hash::check($request->password, $user->password)){
            return response()->json([
                'success' => false,
                'message' => 'login failed'
            ], 401);
        }
        return response()->json([
            'success' => true,
            'message' => 'login success'
        ], 200);
    }

    public function loginView(Request $request){
        $user = User::where('username', $request->username)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return view('login');
        }
        if($user->role == 'admin'){
            return redirect()->route('order.get');
        }

        $request->session()->put('user', $user);
        return redirect()->route('approve.index');
    }
}
