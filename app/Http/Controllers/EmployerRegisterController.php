<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Company;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Str;


class EmployerRegisterController extends Controller
{
    public function employerRegister(Request $request){//to use the request method you have to declare here
        

        $this->validate($request,[       //requires you to put an address in your form. This validates form.

            'cname'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8|confirmed'
      
            ]);
    

        $user = User::create([

            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type'),
            //your creating the user type in the users table
            //when you login into this employer registration form it will create the email,password, and user_type in the users table



        ]);

        Company::create([
'user_id'=>$user->id,
//this will pull the id from the users table into the user_id column in the Company table

'cname'=>request('cname'),
'slug'=>Str::slug(request('cname'))

//when you login into this employer registration form it will create the email,password, and user_type in the company table


//we can convert anything to slug by using the Str::slug
//this helper funciton will give the url the name of cname
//slug are part of the url that identifies a particular page 

//this is the company table we created user_id,cname, and slug.
//You declared this in you employer-register.blade.php in the form
//this is for a registration system for the employer
//this is how you linked profiles table with users
//your building a relationship between user table and company table




        ]);
        $user->sendEmailVerificationNotification();
//this is for email verification, you must have this for custom registration controllers
      
        return redirect()->to('/login')->with('message','Please verify your email address');
    }
    }

