<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        Log::channel('User')->info('Login', ['ip' => $request->ip(), 'data' => $request->all()]);
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6',
        ]);
        if (! Auth::attempt($attr)) {
            return $this->error('Credentials not match', 401);
        }

        if (auth()->user()->role == 'admin' || auth()->user()->role == 'employee') {

            $response = [
                'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
                'token_type' => 'Bearer',
                'user' => auth()->user()->employee,
            ];

            // auth()->user()->employee,
            $code = 200;
        } else {
            auth()->user()->tokens()->delete();
            $response = [
                'message' => 'You are not allowed to login',
            ];
            $code = 401;
        }

        return response()->json($response, $code);
    }

    public function logout()
    {
        Log::channel('User')->info('Logout', ['data' => auth()->user()]);

        $response = [
            'success' => true,
            'message' => 'Tokens Revoked',
        ];
        auth()->user()->tokens()->delete();

        return response()->json($response, 200);
    }
}
