<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {

        $request->authenticate();

        $token = $request->user()->createToken('Gloglo');
        $user = $request->user();

        return response()->json(["success"=> true, "Gloglo" => $token->plainTextToken, 'user' => $user,]);

    }

    /**
     * Destroy an authenticated session.
     */
    public function logout(Request $request)
    {

        $request->user()->currentAccescToken()->delete();

        return response()->json(['success'=> false, 'error'=>'Logout fail']);
    }
}
