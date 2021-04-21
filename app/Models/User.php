<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Profile;
use App\Models\Company;
use App\Models\Job;



class User extends Authenticatable implements MustVerifyEmail //you added implements mustverifyemail for email verification
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Company(){
        return $this->hasOne(Company::class);
        //,"Useridientification","email"
        //$user->Company->id   
        //must declare the type of relationship it has with the user and company
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }
   
}
