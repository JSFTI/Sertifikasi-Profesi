<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $cred = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => ['required', function($attr, $value, $fail) use ($request) {
                $user = User::where('email', $request->email)
                    ->select('password')
                    ->first();

                if(!$user || Hash::check($value, $user->password)){
                    return;
                }

                $fail('Password tidak sesuai');
            }]
        ], [
            'email' => [
                'required' => 'Harap berikan email Anda',
                'email' => 'Format email kurang tepat',
                'exists' => 'Akun tidak terdaftar'
            ],
            'password.required' => 'Harap berikan password Anda',
        ]);

        if(!Auth::attempt($cred)){
            return response()->json([
                'messaage' => 'Login failed'
            ], 400);
        }

        $request->session()->regenerate();
    }

    public function logout(){
        Auth::logout();
        return response()->redirectToRoute('index');
    }
}
