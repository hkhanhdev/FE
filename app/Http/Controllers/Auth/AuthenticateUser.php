<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthenticateUser extends Controller
{
//    protected $rules = [
//        'email' => ['required'], //,'email','ends_with:gmail.com'
//        'password' => 'required' //|string|min:6
//    ];
    protected $rules = [
        'email'=>[],
        'password'=>[]
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
//        dd($authenticated);
        $response = Http::post("http://localhost:8000/api/v1/login",
            ['email'=>$authenticated['email'],
            'password'=>$authenticated['password']])->json();
//        dd($response);
        if (isset($response['access_token'])) {
            $request->session()->now("auth_success","Logged in successfully!");
            $access_token = $response['access_token'];
            session()->put("access_token",$access_token);
        }elseif (isset($response['error'])) {
//            session()->flash("auth_failed","Your provided credentials are not accessible!");
            $request->session()->now("auth_failed","Your provided credentials are not accessible!");
        }else {
            if (isset($response['email'])) {
                $request->session()->now("error","Please check your email field!");
            }elseif (isset($response['password'])) {
                $request->session()->now("error","Please check your password field!");
            }else {
                $request->session()->now("error","Please try again!");
            }
        }
        return view("pages.sign_in");
    }
}
