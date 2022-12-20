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

    public function register(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required_with:password'
        ], [
            'name' => [
                'required' => 'Harap berikan nama Anda',
                'max' => 'Nama terlalu panjang, maksimal 255 karakter'
            ],
            'email' => [
                'required' => 'Harap berikan email Anda',
                'email' => 'Harap berikan format email yang tepat',
                'unique' => 'Email telah terdaftar'
            ],
            'password' => [
                'required' => 'Harap berikan password',
                'confirmed' => 'Harap untuk mengkonfirmasi password Anda'
            ],
            'password_confirmation' => [
                'required' => 'Harap konfirmasi password Anda'
            ]
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);
    }

    public function logout(){
        Auth::logout();
        return response()->redirectToRoute('index');
    }
}
