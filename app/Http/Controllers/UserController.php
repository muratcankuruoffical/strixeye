<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        if (Request()->isMethod('GET')) {
            return view('users.login');
        } else {
            $credentials = Request()->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->intended('users/dashboard');
            }
            return redirect()->route('user.dashboard')->withErrors([
                'message' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function register(UserRequest $request)
    {
        if (Request()->isMethod('GET')) {
            return view('users.register');
        } else {
            User::create(array_merge($request->validated(), ['password' => bcrypt($request->password)]));
            return redirect()->route('user.dashboard')->with('status', 'User Successfully Registered.');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function dashboard()
    {
        return view('users.dashboard');
    }
}
