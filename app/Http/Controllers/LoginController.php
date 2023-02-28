<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(Request $request) {
        if (Auth::check()) {
            return redirect()
                ->route('user.private');
        }
        
        return view('login');
    }

    public function login(Request $request) {
        if (Auth::check()) {
            return redirect()
            ->route('user.private');
        }

        $formData = $request->only(['email', 'password']);

        if (Auth::attempt($formData)) {
            return redirect()
                ->route('user.private');
        }

        return redirect()
            ->route('user.login')
            ->withErrors([
                'email' => 'Wrong password or email'
            ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect(route('main'));
    }
}
