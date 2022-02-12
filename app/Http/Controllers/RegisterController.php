<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validated = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:7', 'max:255', 'unique:users,username'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email'],
            'password' => ['required', 'max:255'],
        ]);

        $user = User::create($validated);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created');
    }
}
