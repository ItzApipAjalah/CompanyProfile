<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $ipAddress = $request->ip();
        $key = 'login_attempts:' . $ipAddress;

        if (RateLimiter::tooManyAttempts($key, 5)) {
            return back()->withErrors([
                'email' => 'Too many login attempts. Please try again later.',
            ])->withInput($request->only('email'));
        }

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            RateLimiter::clear($key);

            Log::info('User logged in successfully.', ['email' => $request->email, 'ip' => $ipAddress]);

            return redirect()->route('admin.dashboard');
        }

        Log::warning('Failed login attempt.', ['email' => $request->email, 'ip' => $ipAddress]);

        RateLimiter::hit($key, 600);

        return back()->withErrors([
            'email' => 'Email or password is incorrect.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        return redirect('/login');
    }
}
