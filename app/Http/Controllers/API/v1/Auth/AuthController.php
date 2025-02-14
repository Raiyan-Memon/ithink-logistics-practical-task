<?php
namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required|confirmed',
        ]);
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user'  => $user,
            'token' => $token,
        ];
        return response($response, 201);
    }

    public function login(Request $request)
    {
        $t = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request['email'])->first();
        if (! $user || ! Hash::check($request['password'], $user->password)) {
            return response([
                'message' => 'Bad Credential!',
            ], 401);
        }
        $response = [
            'user'  => $user,
            'token' => $user->createToken('user')->plainTextToken,
        ];
        return response($response, 200);
    }

    public function logout(Request $request)
    {
        Auth::logout();
    }
}
