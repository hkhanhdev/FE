<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function toSignIn()
    {
        return view("pages.sign_in");
    }

    public function toSignUp()
    {
        return view("pages.sign_up");
    }

    public function toContact()
    {
        return view("pages.contact");
    }

    public function home()
    {
        return view("pages.welcome");
    }
}
