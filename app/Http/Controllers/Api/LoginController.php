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
    private $apiToken;
    public function __construct()
    {
        //create token
        $this->apiToken = uniqid(base64_encode(Str::random(40)));
    }
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

}
