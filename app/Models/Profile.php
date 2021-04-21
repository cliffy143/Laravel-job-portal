<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

  public $fillable = [
    
        
        'user_id', 
        'address', 
        'gender',
        'DOB',
        'experience', 
        'bio', 
        'cover_letter',
        'resume',
        'avatar', 
        'phone_number'
   
      

    ];
  

}
