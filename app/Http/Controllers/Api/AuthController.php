<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Handle GET request: show a message indicating the required method and parameters
        if ($request->isMethod('get')) {
            return response()->json([
                'message' => 'This endpoint requires an email and password. Please include these parameters and use the POST method to submit your credentials.'
            ], 405); // HTTP status code 405 for Method Not Allowed
        }

        // Validate email and password
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'The provided credentials are incorrect.'
            ], 401);
        }

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'token' => $token,
        ]);
    }
}
