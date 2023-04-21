<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function register() {
        return view('login.register');
    }

    public function showErr() {
        return redirect('login')->withErrors([
            'error' => 'Invalid data'
        ]);
    }

    public function registerPost(Request $request) {
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);  

        return redirect('login')->with('success', 'Account created successfully!');
    }

    public function loginPost(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/todos');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
