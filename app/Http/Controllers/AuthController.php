<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Requests\RegisterFormRequest;

class AuthController extends Controller {

    public function __construct() {
        $this->middleware(RedirectIfAuthenticated::class, ['except' => ['logout']]);
    }

    public function showLogin() {
        return view('login');
    }

    public function doLogin(Request $request) {

        // process the form
        // validate the info, create rules for the inputs
        $rules = [
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        ];

// run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

// if the validator fails, redirect back to the login age
        if ($validator->fails()) {
            return Redirect::to('login')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {

            // attempt to do the login
            if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')])) {

                // validation successful!

                return Redirect::to('/contacts/dashboard');
            } else {

                $request->session()->flash('alert-danger', 'User was successful added!');

                // validation not successful, send back to login form 
                return Redirect::to('login');
            }
        }
    }

    public function logout() {
        // logout user and redirect to welcome screen
        Auth::logout();
        Session::flush();
        return redirect('/welcome');
    }

    public function showRegister() {
        return view('register');
    }

    public function doRegister(RegisterFormRequest $request) {

        User::saveUser(['name' => $request->name, 'email' => $request->email, 'password' => $request->password]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return Redirect::to('dashboard')->with('alert-success', 'You are registered successfully.');
//            return Redirect::to('login');
        }
        return view('register');
    }

}
