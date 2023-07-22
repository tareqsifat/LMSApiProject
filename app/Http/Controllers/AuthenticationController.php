<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\UserMail;
use App\Jobs\UserMailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthenticationController extends Controller
{

    /**
     * Summary of register
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,',
            'phone' => 'required|unique:users,phone,',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'status' => User::ACTIVE,
            'role' => User::USER,
            'password' => Hash::make($request->input('password')),
        ]);
        // UserMailJob::dispatch($user);

        $token = $user->createToken('lmsApi')->accessToken;

        // $token = $user->createToken('lmsToken')->accessToken;

        $response = [
            'user' => $user,
            'token' => $token,
            'message' => 'user created successfully',
        ];

        return response()->json($response);
    }


    /**
     * Summary of login
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return response()->json(['message' => 'Email & Password dosen\t match']);
        }

        $token = $user->createToken('lmsToken')->accessToken;

        $response = [
            'user' => $user,
            'token' => $token,
            'message' => 'Login successfully',
        ];

        return response()->json($response);
    }

    /**
     * Summary of logout
     * @return void
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message=>loged out']);
    }
}
