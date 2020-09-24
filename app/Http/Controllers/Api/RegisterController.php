<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resource\UserResource;
use App\User;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function action(Request $request)
    {
        //validasi untuk requirement inputan
        $this->validate($request, [
            'name' => 'required|string',
            'username' => 'required|unique|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'no_hp' => 'required|unique|numeric',
            'alamat' => 'required',
        ]);


        //mengirim request untuk $user
        $user = User::create([
             'name' => $request->name,
             'username' => $request->username,
             'email' => $request->email,
             'password' => bcrypt($request->password),
             'no_hp' => $request->no_hp,
             'alamat' => $request->alamat,
             'desc' => $request->desc,
             'api_token' => Str::random(80),
        ]);
        
        
        //mengembalikan nilai $user untuk dikirim UserResource
        return (new UserResource($user))->additional([
            'meta' => [
                'token' => $user->api_token,
            ]
        ]);
    }
}
