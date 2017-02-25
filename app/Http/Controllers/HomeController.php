<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewWelcome()
    {
        return view('welcome');
    }

    public function viewRegisterForm()
    {
        return view('register');
    }

    public function viewLoginForm()
    {
        return view('login');
    }
}
