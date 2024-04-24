<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Register extends Controller
{
    protected $rules = [
        'email' => ['required','email','ends_with:gmail.com'],
        'phone' => ['required','regex:/^(?:\+84|0)?[1-9]\d{8,9}$/'],
        'password' => 'required|string|min:6|confirmed'
    ];

    protected $messages = [
        'email.required' => "Email field cannot be empty!",
        'email.email' => "Please enter a valid email address!",
        'email.ends_with' => "Please enter an email address with valid domain!",
        'phone.required' => "Phone field cannot be empty!",
        'phone.regex' => 'Please enter a valid phone number!',
        'password.required' => 'Please enter your password!',
        'password.confirmed' => 'The password confirmation does not match!',
        'password.min' => 'Password must have more than 6 characters!',
    ];

    public function registeringUser(Request $request)
    {
        $validatedData = $request->validate($this->rules,$this->messages);
//        session()->flash("email_taken","This email is already taken!");
//        session()->flash("phone_taken","This phone number is already taken!");
        return view("pages.sign_up");
    }
}
