<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!$validated) {
            return back()->withErrors($validated)->withInput();
        }

        if (Auth::attempt($validated)) {
            return redirect()->route('home');
        } else {
            return back()->withErrors([
                'errors' => 'The provided credentials does not match our records'
            ])->withInput();
        }
    }
}
