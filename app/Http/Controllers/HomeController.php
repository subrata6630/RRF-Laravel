<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Exception;

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
            'email' => 'required|email',
            'username' => 'required|min:6',
            'password' => 'required|min:6',
            'photo' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);

        // process photo upload
        $fileObject = $request->file('photo');
        $file_ext = $fileObject->extension();
        $file_name = str_random(16) . '.' . $file_ext;
        $path = $fileObject->storeAs('profile_photo', $file_name);

        if ($path) {
            $data = [
                'email' => $request->input('email'),
                'username' => $request->input('username'),
                'password' => bcrypt($request->input('password')),
                'photo' => $path,
            ];

            try {
                // insert a row
                /*$user = new User;
                $user->email = $request->input('email');
                $user->username = $request->input('username');
                $user->password = bcrypt($request->input('password'));
                $user->photo = $path;
                $user->save();*/

                User::create($data);

                session()->flash('message', 'Registration successful');
                return redirect()->route('login');
            } catch (Exception $e) {
                session()->flash('message', $e->getMessage());
                return redirect()->back();
            }
        } else {
            session()->flash('message', 'Photo was not uploaded for some reason!');
            return redirect()->back();
        }
    }

    public function viewLoginForm()
    {
        return view('login');
    }
}
