<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $guard = $request->user_type;

        if (!in_array($guard, ['admin', 'veterinarian', 'client'])) {
            return back()->withErrors(['email' => 'Invalid user type']);
        }

        if (Auth::guard($guard)->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended("/$guard/dashboard");
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        foreach (['admin', 'veterinarian', 'client'] as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
            }
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
