<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class Register extends Controller
{
    protected $rules = [
        'username' => ['min:8','max:100'],
        'email' => ['required','email','ends_with:gmail.com'],
        'phone' => ['required','regex:/^(?:\+84|0)?[1-9]\d{8,9}$/'],
        'password' => 'required|string|min:8|confirmed'
    ];

    protected $messages = [
        'email.required' => "Email field cannot be empty!",
        'email.email' => "Please enter a valid email address!",
        'email.ends_with' => "Please enter an email address with valid domain!",
        'phone.required' => "Phone field cannot be empty!",
        'phone.regex' => 'Please enter a valid phone number!',
        'password.required' => 'Please enter your password!',
        'password.confirmed' => 'The password confirmation does not match!',
        'password.min' => 'Password must have more than 8 characters!',
        'username.min' => 'Username must have more than 8 characters!',
        'username.max' => 'Username must have less than 100 characters!',
    ];

    public function registeringUser(Request $request)
    {
        $validatedData = $request->validate($this->rules,$this->messages);
//        dd($validatedData);
        $response = Http::post("http://localhost:8000/api/v1/register",
            ["name"=>$validatedData['username'],
            "email"=>$validatedData['email'],
            "password"=>$validatedData['password'],
            "confirm_password"=>$validatedData['password'],
            "phone_number"=>$validatedData['phone']
        ])->json();
//        dd($response);
        if (isset($response['errors'])) {
            if (isset($response['errors']['email'])) {
//                session()->flash("email_taken",$response['errors']['email'][0]);
                $request->session()->now("email_taken",$response['errors']['email'][0]);
            }
            if (isset($response['errors']['phone_number'])) {
//                session()->flash("phone_taken",$response['errors']['phone_number'][0]);
                $request->session()->now("phone_taken",$response['errors']['phone_number'][0]);
            }
        }else {
            session()->flash("register","Successfully registered!");
        }

        return view("pages.sign_up");
    }
}
