<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Rfc4122\Validator;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $usuario = User::where('email', $request->email)->first();
        if (!$usuario || !Hash::check($request->password, $usuario->password))
        {
            return response()->json(['error' => 'Credenciales no válidas'], 401);
        }
        else
        {
            $token = $usuario->createToken($usuario->email)->plainTextToken;

            return response()->json(compact('token', 'usuario'));
        }
    }
    public function register(Request $request){
        $postArray = $request->all();

        $postArray['password'] = bcrypt($postArray['password']);
        $user = User::create($postArray);
        $token = $user->createToken($user->email)->plainTextToken;

        return response()->json(compact('token', 'user'),200);
    }
}
