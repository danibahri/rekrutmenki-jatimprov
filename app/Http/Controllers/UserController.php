<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        return view('pages.landing');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
}
