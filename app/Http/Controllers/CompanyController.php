<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function __construct(){
        // Code called for each new job we create
        $this->middleware(['employer','verified'],['except'=>array('index')]);
    }



    public function index($id, Company $company){ 

return view('company.index',compact('company'));

//compact has to match the variable

    }
    public function create(){ 

        return view('company.create');
        
            }
            public function store(Request $request){
              
                  $user_id = auth()->user()->id;
                  //your declaring what $user_id is, which is the authorized users id.
//this says you have to be the authorized user 
//this will give the current id of the authorized user in the profiles database. User_id is the in the profiles database.
                  
          Company::where('user_id',$user_id)->update([
          //you declared what $user_id is above this code
     // so the profile with the profile user_id table and authorized users id table, update the address,experience and bio once submitted form.


                      'address'=>request('address'),
                      'phone'=>request('phone'),
                      'website'=>request('website'),
                      'slogan'=>request('slogan'),
                      'description'=>request('description')
//address,phone,website,slogan, and description are the names in your form in your create.blade.php folder


 ]);
                  return redirect()->back()->with('message', 'Profile Successfully Updated!' );
       
}
public function coverPhoto(Request $request){
    //the request object means your retireving data from the database
    //coverPhoto is in your route

    $user_id = auth()->user()->id;
    //your declaring what $user_id is, which is the authorized users table id.

    if($request->hasfile('cover_photo')){
        //if the user has requested and has the file cover_photo which is the "name" of the input field in the form on create.blade

        $file = $request->file('cover_photo');
    //declaring what $file is. this variable request the file cover_photo from the database

        $ext = $file->getClientOriginalExtension();
    //declares $ext, gets the cover_photo extension(jpg or png etc.). 


        $filename = time().'.'.$ext;
     //declaring filename, which is the cover_photo extension(jpg etc) and it will be saved in the database with a numeric value(time)

$file->move('uploads/coverphoto/',$filename);
     // once you request from database, move the requested file cover_photo to the uploads/cover_photo folder as an extension(jpg etc)

Company::Where('user_id',$user_id)->update([
 //so where theres the user_id in profiles table and authenticated users id, update the cover_photo(form) extension once submitted the form.

'cover_photo'=>$filename
          //updates these two

]);
return redirect()->back()->with('message', 'Profile Successfully Updated!' );

    
    }
}
    public function companyLogo(Request $request){
        //request object means your retireving data from the database
        //coverPhoto is in your route
    
        $user_id = auth()->user()->id;
        //your declaring what $user_id is, which is the authorized users table id.
    
        if($request->hasfile('company_logo')){
            //if the user has requested and has the file cover_photo which is the "name" of the input field in the form on create.blade
    
            $file = $request->file('company_logo');
        //declaring what $file is. this variable request the file cover_photo from the database
    
            $ext = $file->getClientOriginalExtension();
        //declares $ext, gets the cover_photo extension(jpg or png etc.). 
    
    
            $filename = time().'.'.$ext;
         //declaring filename, which is the cover_photo extension(jpg etc) and it will be saved in the database with a numeric value(time)
    
    $file->move('uploads/logo/',$filename);
         // once you request from database, move the requested file cover_photo to the uploads/cover_photo folder as an extension(jpg etc)
    
    Company::Where('user_id',$user_id)->update([
     //so where theres the user_id in profiles table and authenticated users id, update the cover_photo(form) extension once submitted the form.
    
    'logo'=>$filename
              //updates these two
    
    ]);
    return redirect()->back()->with('message', 'Profile Successfully Updated!' );

}
}

}

// the compact name is in the wildcard in your routes folder. They must match.
//this is route model binding
//you can use dd($name->cname)
