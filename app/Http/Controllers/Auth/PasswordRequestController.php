<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordRequestController extends Controller
{
    public function index()
	{
	    return view('auth.requestPassword');
	}

    public function resend(Request $request)
	{
        $request->validate(['email' => 'required|email|exists:users']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

	    return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => 'We have emailed your password reset link!'])
            : back()->withErrors(['email' => 'Please wait before retrying.']);
	}
}
