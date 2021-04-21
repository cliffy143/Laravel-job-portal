<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Profile;
use App\models\Job;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware(['seeker','verified']);  //this code says construct me this middleware and only allow seeker to access the users controller methods
        //the verified in this array is for the email verification
        //if your not email verified it will restrict you from accessing methods in this controller
    } 


    public function __invoke(Request $request)
    {
        //
    }



    public function index(){
        return view('profile.index'); //your referencing the index.blade.php so laravel knows what page you have linked this controller to
    }  



    public function store(Request $request){
      $this->validate($request,[       //requires you to put an address in your form. This validates form.

      'address'=>'required',
      'bio'=>'required|min:20',
      'experience'=>'required|min:20',
      'phone_number'=>'required|min:10'

      ]);
        $user_id = auth()->user()->id; //your declaring what $user_id is, which is the authorized users table id.

        
//this will give the current id of the authorized user in the profiles database. User_id is the in the profiles database.



        Profile::where('user_id',$user_id)->update([ //this is so we can update this information in your profiles table

     // so the profile with the profile user_id table and authorized users id table, update the address,experience and bio once submitted form.

            //must be logged in to update
            'address'=>request('address'),
            'experience'=>request('experience'),
            'bio'=>request('bio'),
            'phone_number'=>request('phone_number')   //phone_number is your form in index.blade in profile folder



        ]);


        return redirect()->back()->with('message', 'Profile Successfully Updated!' ); //this will give you a mesage alert after you submit in your profiles.index page

//this is for our form in profiles.index.php views page
//you declared what 'message' is in your profile/index.blade.php
   


}

public function coverletter(Request $request){   //coverletter is the route


    $this->validate($request,[ //this validates the cover_letter
        'cover_letter'=>'required|mimes:pdf,doc,docx|max:20000' //cover_letter is the "name" of the form in index.blade.php
]);  



    $user_id = auth()->user()->id; //give me the authenticated users id in the users table 

    $cover = $request->file('cover_letter')->store('public/files');  //it requests the cover_letter file from database and then stores it in the storage/app/public/files folder

        Profile::where('user_id',$user_id)->update([  //so where theres the user_id in profiles table and authenticated users id, update the cover_letter(form) once submitted the form.

          'cover_letter'=>$cover  //cover_letter is the "name" of the form in index.blade.php 
        ]);

        return redirect()->back()->with('message','Cover letter Sucessfully Updated!');

}




public function resume(Request $request){ //resume is the route
    $this->validate($request,[
        'resume'=>'required|mimes:pdf,doc,docx|max:20000',  //resume is the "name" of the form in index.blade.php

    ]);
    
    $user_id = auth()->user()->id;  //give me the authenticated users id in the users table 

    $resume = $request->file('resume')->store('public/files');  //it requests the resume file from database and then stores it in the storage/app/public/files folder

        Profile::where('user_id',$user_id)->update([  //so where theres the user_id in profiles table and authenticated users id, update the resume(form) once submitted the form.

          'resume'=>$resume   //resume is the "name" of the form in index.blade.php 
        ]);
        return redirect()->back()->with('message','resume letter Sucessfully Updated!');

}

//Validate the resume, Give the requested file resume and store it in the public folder then Update the authenticated users resume form




public function avatar(Request $request){
    $this->validate($request,[ //this validates the avatar form
        'avatar'=>'required|mimes:png,jpeg,jpg|max:20000'
    ]);


    $user_id = auth()->user()->id; //$user_id is authenticated user id
   
    if($request->hasfile('avatar')){ //if the user has the file avatar

        $file = $request->file('avatar');  //declaring what $file is, request the file avatar from the database. Pulling data from the database.

        $ext =  $file->getClientOriginalExtension(); //declares $ext, gets the avatar's extension(jpg or png etc.). 

        $filename = time().'.'.$ext;  //declaring filename, which is the avatar extension(jpg etc) and it will be saved in the database with a numeric value(time)

        $file->move('uploads/avatar/',$filename);  //moves the requested file avatar to the uploads/avatar folder as an extension(jpg etc)

        Profile::where('user_id',$user_id)->update([  //so where theres the user_id in profiles table and authenticated users id, update the avatar(form) extension once submitted the form.

          'avatar'=>$filename  //updates these two
        ]);
    return redirect()->back()->with('message','Profile picture Sucessfully Updated!');
    }

}

//if it has the file avatar, then get me the file avatar with the extension and save it with a numeric value. Then move a copy of the file to a the uploads folder and update it.
}

