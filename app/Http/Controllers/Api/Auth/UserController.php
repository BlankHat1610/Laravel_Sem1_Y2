<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $users = User::create([
            'name' => request('name'),
            'address' => request('address'),
            'phone' => request('phone'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        return response()->json($users, Response::HTTP_OK);
    }

    public function login(Request $request)
    {
        $phone = $request->phone;
        $password = $request->password;

        $user = User::where("phone", $phone)->first();
        
        if (Hash::check($password, $user->password)) {
            return response()->json($user, 200);
        } else return response("Sai roi");
    }
}
