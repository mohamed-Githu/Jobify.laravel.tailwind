<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create() {
        return view('users.create');
    }

    public function store() {
        $formFields = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6', ]
        ]);

        // hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // create user
        $user = User::create($formFields);

        // login
        auth()->login($user);

        // redirect
        return redirect('/')->with('message', 'User created and logged in!');
    }

    public function logout() {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }

    public function login() {
        return view('users.login');
    }

    public function authenicate() {
        $formFields = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($formFields)) {
            request()->session()->regenerate();

            return redirect('/')->with('message', 'You\'re now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credintials']);
    }
}
