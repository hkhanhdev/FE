<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticateUser extends Controller
{
    protected $rules = [
        'email' => ['required','email','ends_with:gmail.com'],
        'password' => 'required|string|min:6'
    ];

    protected $messages = [
        'email.required' => "Email field cannot be empty!",
        'email.email' => "Please enter a valid email address!",
        'email.ends_with' => "Please enter an email address with valid domain!",
        'password.required' => 'Please enter your password!',
        'password.min' => 'Password must have more than 6 characters!',
    ];

    public function authenticate(Request $request)
    {
        $authenticated = $request->validate($this->rules,$this->messages);
        return view("pages.sign_in");
    }
}
