<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($validated, $request->boolean(('remember')))){
            $request->session()->regenerate();
            return to_route('home')->with('success', 'Welcome back!');
        }

        return back()->withErrors(['email'=> 'The credentials do not match oour records.'])->onlyInput('email');
    }
}
