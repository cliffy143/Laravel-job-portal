<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public $fillable = [
    
        
        'user_id', 
        'company_id', 
        'title',
        'slug',
        'description', 
        'category_id', 
        'position',
        'address',
        'type', 
        'status', 
        'last_date',
        'password'
      

    ];

    public function getRouteKeyName(){

        return 'slug';
    }

    //You must reference the  slug  in the jobs model to link the page to the show.blade.php 
    //<a href="{{route('jobs.show',[$job->id,$job->slug])}}" > in welcome.blade.php
    //model binding to always use a database column other than id 



    

    
    public function company(){

        return $this->belongsTo(Company::class);
    }
    //always needs to have id to associate with model
//You must reference the type of relationship each model is having with one another for example the jobs model is belonging to the company model 
//Company hasMany jobs and jobs belongsTo companies
//this allows us to pull data from the company tables so we can pull the id of the companies table by declaring the relationship beforehand in your show.blade.php file
public function users(){
    return $this->belongsToMany(User::class)->withTimeStamps();
}
//jobs belongs to many users

public function checkApplication(){
  return \DB::table('job_user')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();

//in the job_user table where theres the user_id which is equal to the authenticated user id and where the job_id which is equal to this job id, check if your query returns any records
//exists which allows you to check if your query returns any records
} 


}

