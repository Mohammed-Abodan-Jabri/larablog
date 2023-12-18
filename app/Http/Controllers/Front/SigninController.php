<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use App\Http\Controllers\Controller;
use App\Models\User;

class SigninController extends Controller
{
    public function view(Request $request)
    {
        return view('front.signin');
    }

    public function authenticate(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email|max:250|unique:users',
        //     'password' => 'required|min:8'
        // ]);

        // $email = $request->email;
        // $password = $request->password;

        

        // // Find the user by email
        // $user = User::where('email', $email)->first();
        // dd($user);exit;

        // // Check the given password against the hashed password
        // if (!Hash::check($password, $user->password)) {
        //     return null;
        // }

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('user.dashboard')
                ->withSuccess('You have successfully signed in!');
        }
    }
}
