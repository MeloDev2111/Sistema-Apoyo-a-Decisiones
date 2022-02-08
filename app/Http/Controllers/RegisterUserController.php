<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RegisterUserController extends Controller
{
    public function registerUser(){
        $roles = Role::all();
       return view('auth.register',compact('roles'));

    }

    public function saveUser(UserRequest  $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->rol);
         return view('index');
    }


}
