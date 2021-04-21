<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use Illuminate\Support\Str;
use App\Http\Requests\JobPostRequest;
use App\models\User;
use App\models\Category;
use Illuminate\Support\Facades\Auth;


class JobController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
         // Code called for each new job we create
         $this->middleware(['employer','verified'],['except'=>array('index','show','apply','alljobs')]);
     }

//this says construct me this middleware to only allow the employer to acces the jobscontroller methods besides the index,show,alljobs, and apply methods

//middleware will not be applied to show and index
//This middleware is to restrict job seeker to creating a job.
//this will protect all job seeker routes from employer routes so a seeker can post a job etc.

public function applicant(){
    $applications = Job::has('users')->where('user_id',auth()->user()->id)->get();
    return view('jobs.applicants',compact('applications'));
}

    public function index(Request $request)
    {

        $jobs = Job::latest()->limit(10)->where('status',1)->get(); //declaring jobs, in the jobs table get only the latest 10 where the status is 1
$companies = Company::get()->random(12); //declaring companies, In the company tables get me 12 at random


        return view('welcome',compact('jobs','companies')); //the compact name should always the matche the variable

        // return the view and the jobs
// the compact name is in the wildcard in your routes folder. They must match.

    }
    public function show($id,Job $job){  //your referencing the model job and the $job variable is being referenced in your routes folder
 //this is route model binding which simplifies this $job = job::find($id);


        return view('jobs.show',compact('job'));  // referencing the jobs.show.blade
   // the compact name is in the wildcard in your routes folder. They must match.


   
    }
    public function create(){
        return view('jobs.create'); //this says display the view jobs.create.
    } 

    public function company(){
    	return view('company.index'); //this says display the view company.index.
    } 


    public function myjob(){

        $jobs = Job::where('user_id',auth()->user()->id)->get();  //in the jobs table, where theres the user_id and the authenticated user id "get" this information from the database to display in the jobs/my-job.

        return view('jobs.myjob',compact('jobs'));  //return the view myjob in your jobs folder. The alias name is my-job. You determined this in your routes folder.
    }

    public function edit($id){
        $job = Job::findOrFail($id);  // we have to find the job using the $id
//you defined $job so you may use it in your blade file to pull data from the job table


        return view('jobs.edit',compact('job'));
    }

public function update(Request $request,$id){
$job = Job::findOrFail($id); //declaring job, in the job database find id
//you want to find the id so all the updated information will be linked to that particular id
$job->update($request->all());//if you find the id then update all the requested information to the database
return redirect()->back()->with('message','Job updated successfully!');  //if successfull then display this message


}






    public function  store(JobPostRequest $request){  //store JobPostRequest is the validation request folder you generated
        //your storing this in the database
 $user_id = auth()->user()->id;  //declaring $user_id as the current authenticated user
  $company = Company::where('user_id',$user_id)->first(); //declaring $company, in the Company database where theres the 'user_id and the authenticated user's table id get the first(one) record
  $company_id = $company->id;  //Declaring $company_id as the company id

        Job::create([   //your creating this in the jobs database table

            'user_id' => $user_id,
            'company_id' => $company_id,
            'title'=>request('title'),
            'slug' =>Str::slug(request('title')),
            'description'=>request('description'),
            'roles'=>request('roles'),
            'category_id' =>request('category'),
            'position'=>request('position'),
            'address'=>request('address'),
            'type'=>request('type'),
            'status'=>request('status'),
            'last_date'=>request('last_date'),
            'number_of_vacancy'=>request('number_of_vacancy'),
            'gender'=>request('gender'),
            'experience'=>request('experience'),
            'salary'=>request('salary')
         


        ]);

        return redirect()->back()->with('message','Job posted successfully!');
     }

     public function apply(Request $request,$id){
         $jobId = Job::find($id);
         $jobId->users()->attach(Auth::user()->id);
         //attach the logged in users id
        return redirect()->back()->with('message','Application sent!');

        }
        public function alljobs(Request $request){

            $keyword = $request->get('title');
            $type = $request->get('type');
            $category = $request->get('category_id');
            $address = $request->get('address');
            
if($keyword||$type||$category||$address){
//if this comes, the keyword or type or category or address

    $jobs = Job::where('title','LIKE','%'.$keyword.'%')
    ->orWhere('type',$type)
    ->orWhere('category_id',$category)
    ->orWhere('address',$address)
    ->paginate(10);

return view('jobs.alljobs',compact('jobs'));

}else{

            $jobs = Job::latest()->paginate(10);
            return view('jobs.alljobs',compact('jobs'));
        }
       
}
}

