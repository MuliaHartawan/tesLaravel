<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resource\UserResource;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function action(Request $request)
    {
        //validasi untuk requirement inputan
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);
        
        //cek request hanya menerima username dan password
        if (auth()->attempt($request->only('username', 'password'))) {
            $currentUser = auth()->user();

            return (new UserResource($currentUser))->additional([
                'meta' => [
                    'token' => $currentUser->api_token, 
                ]
            ]);
        }
        //jika respon gagal akan mengirim nilai json
        return response()->json([
            'error' => 'Login Anda Gagal'
        ], 401);
    }
}
