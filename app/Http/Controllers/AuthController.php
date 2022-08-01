<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->user_type === 'admin') {
                return redirect()->intended('admin/dashboard')->with('success', 'welcome to admin dashboard');
            } else {
                return redirect()->intended('/')
                    ->with('success', 'welcome to user dashboard');
            }
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function userRegistration(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => "required|unique:users,email",
            'password' => 'required|string|confirmed|min:8',
        ]);
        if (!$validated_data) {
            return back()->with('error', 'something went wrong');
        }
        $validated_data['user_type'] = 'user';
        $validated_data['password'] = Hash::make($request->password);
        User::create($validated_data);
        return redirect()->route('login')->with('success', 'User Created successfylly');
    }


    public function signOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
