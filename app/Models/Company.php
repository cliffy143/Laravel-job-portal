<?php

namespace App\Models;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

  







    public $fillable = [
    
        
        'user_id', 
        'cname', 
        'address',
        'phone',
        'website', 
        'slug', 
        'cover_photo',
        'slogan',
        'description', 
        'logo', 
       

     
      

    ];
 
   //company hasMany jobs. Your on the company model and you declared the hasMany jobs below

    public function jobs(){

        return $this->hasMany(Job::class);
    }
    public function getRouteKeyName(){

        return 'slug';
    }
    //we add this code because were getting everything by the slug referenced in show.blade.php
    //we add this code becuase were finding something based on the slug because by default it will try finding it by the id not the slug
}

//Your referencing the type of relationship.
//Companies hasMany Jobs
//You have to declare the type of relationship when one database is communication with another database
//for examples $job is communication with $company which are your database names
//