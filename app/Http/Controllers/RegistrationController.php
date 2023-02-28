<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function show() {
        if (Auth::Check()) {
            return redirect()
                ->route('user.private');
        }
        
        return view('registration');
    }
    
    public function create(Request $request) {
        if (Auth::check()) {
            return redirect()
            ->route('user.private');
        }

        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required|min:10',
            'name' => 'required'
        ]);

        $user = User::create($validatedData);
        if ($user) {
            Auth::login($user);
            return redirect()
                ->route('user.private');
        }

        return redirect()
            ->route('user.login')
            ->withErrors([
                'emailError' => 'Error in saving process'
            ]);
    }
}
