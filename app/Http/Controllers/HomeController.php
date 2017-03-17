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

    public function processRegistration(Request $request)
    {
        // data validation
        $this->validate($request, [
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'photo' => 'required',
        ]);

        // process photo upload

        // insert the data into database

        // registration complete
    }

    public function viewLoginForm()
    {
        return view('login');
    }
}
