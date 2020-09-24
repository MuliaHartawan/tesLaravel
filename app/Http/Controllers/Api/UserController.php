<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function me()
    {
        //autentikasi user
        $user = auth()->user();

        return new UserResource($user);
    }
}
