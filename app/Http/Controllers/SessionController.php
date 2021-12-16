<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function create()
    {
        // Validate the input data
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attemp to log in
        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => "The provided credentials aren't valid",
            ]);
        }

        // Regenerates the session ID
        session()->regenerate();

        // Redirect to home page
        return redirect('/')->with('success', 'Welcome back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Good bye!');
    }
}
