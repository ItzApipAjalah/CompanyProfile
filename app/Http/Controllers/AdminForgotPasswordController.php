<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;

class AdminForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return back()->withErrors(['email' => 'We can\'t find a user with that email address.']);
        }

        $token = Str::random(60);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $admin->email],
            [
                'email' => $admin->email,
                'token' => Hash::make($token),
                'created_at' => now(),
            ]
        );

        $resetLink = url(route('admin.password.reset', ['token' => $token, 'email' => $admin->email], false));

        // Send email using the 'biostark' mailer
        Mail::mailer('biostark')->send('auth.emails.password', ['resetLink' => $resetLink], function ($message) use ($admin) {
            $message->to($admin->email);
            $message->subject('Admin Password Reset');
        });

        return back()->with('status', 'We have e-mailed your password reset link!');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset', ['token' => $token, 'email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return back()->withErrors(['email' => 'We can\'t find a user with that email address.']);
        }

        $tokenData = DB::table('password_reset_tokens')
            ->where('email', $admin->email)
            ->first();

        if (!$tokenData || !Hash::check($request->token, $tokenData->token)) {
            return back()->withErrors(['token' => 'This password reset token is invalid.']);
        }

        $admin->password = Hash::make($request->password);
        $admin->save();

        DB::table('password_reset_tokens')->where('email', $admin->email)->delete();

        return redirect()->route('login')->with('status', 'Your password has been reset!');
    }

    public function showChangePasswordForm()
    {
        return view('auth.passwords.change');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $admin = Admin::find(auth()->id());

        if (!$admin || !Hash::check($request->old_password, $admin->password)) {
            return back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        $admin->password = Hash::make($request->new_password);
        $admin->save();

        // Send email notification to biostark-ai@biostark-ai.com
        $adminEmail = 'biostark-ai@biostark-ai.com';
        $adminName = $admin->name;

        Mail::mailer('biostark')->send('auth.emails.password_change', ['admin' => $admin], function ($message) use ($adminEmail) {
            $message->to($adminEmail);
            $message->subject('Admin Password Changed');
        });

        return redirect()->route('admin.dashboard')->with('status', 'Password changed successfully!');
    }
}

