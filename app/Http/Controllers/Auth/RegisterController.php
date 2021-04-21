<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\models\Profile;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_type' => $data['user_type'],

//this is for the registration form

            //1st user_type is in the database and the 2nd user_type is in the form in register.blade.php 
            //this makes the user_type to seeker because you declared the value to seeker in your register.blade.php
            //this is how you  can signify if the user is a seeker or an employer

        ]);
        Profile::create([
'user_id'=>$user->id,
//this will pull the id from the users table into the user_id column in the profiles table
'gender'=>request('gender'),
'DOB'=>request('DOB')

//this will submit the gender, dob, and user_id to the profiles table and the rest of the information submited in the form will go to ther users table.


//this is the profiles table we created userid,gender, and DOB.
//You declared this in you register.blade.php in the form
//this is for a registration system for the seeker
//this is how you linked profiles table with users
//your building a relationship between user table and profile table




        ]);
      
        return $user;
    }
}
