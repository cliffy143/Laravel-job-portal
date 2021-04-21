@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-2">
    @if(empty(Auth::user()->profile->avatar))
    <img src="{{asset('avatar/serwman1.jpg')}}" width="100" style="width: 100%;">
    <!-- if the authenticated user profile avatar is empty, display image  -->
    @else
    <img src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" width="100" style="width: 100%;">
    <!-- if its not empty  display  the authenticated users profile avatar-->

    @endif
    <br>
    <br>
    <form action="{{route('avatar')}}" method="POST" enctype="multipart/form-data" >
<!-- this is the cover.letter route you declared in the routes folder -->
@csrf
<div class="card">
<div class="card-header"> Update Resume </div>
<div class="card-body">
<input type="file" class="form-control" name="avatar">
<!-- you declared this in your UserController which you included a update action -->
<button class="btn btn-success" type="submit">Update</button>
@if($errors->has('avatar'))
    <div class="error">{{$errors->first('avatar')}}
    </div>
    @endif

</div>
</div>

</form>
    </div>
    <div class="col-md-6">
    <div class="card">
    <div class="card-header">Update Your Profile</div>

    

<form method="POST" action="{{route('profile.create')}}">
<!-- this is the route you declared in the routes folder you made it into a post route -->
@csrf


<div class="card-body">



<div class="form-group">
<label for="">Address</label>
<input type="text" class="form-control" name="address" value="{{Auth::user()->profile->address}}">
    @if($errors->has('address'))
    <div class="error">{{$errors->first('address')}}
    </div>
    @endif
    <!-- this displays "The address field is required" when you dont put anything in the address field  -->
</div>
<div class="form-group">
<label for="">Phone Number</label>
<input type="text" class="form-control" name="phone_number" value="{{Auth::user()->profile->address}}" value="{{Auth::user()->profile->phone_number}}">
@if($errors->has('phone_number'))
    <div class="error">{{$errors->first('phone_number')}}
    </div>
    @endif
    <!-- this displays "The phone number field is required" when you dont put anything in the phone_number field  -->
</div>




<div class="form-group">
<label for="">Experience</label>
<textarea name="experience" class="form-control" value="{{Auth::user()->profile->experience}}">

{{Auth::user()->profile->experience}}

</textarea>
@if($errors->has('experience'))
    <div class="error">{{$errors->first('experience')}}
    </div>
    @endif
    </div>



<div class="form-group">
<label for="">Bio</label>
<textarea name="bio" class="form-control">
 {{Auth::user()->profile->bio}} 
 
</textarea>
@if($errors->has('bio'))
    <div class="error">{{$errors->first('bio')}}
    </div>
    @endif
    </div>



<div class="form-group">
<button class="btn btn-success" type="submit">Update</button>
</div>



</div>

</div>

@if(Session::has('message'))
                 <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
<!-- you declared "message" in your usercontroller -->
</div>

</form>
<div class="col-md-4">
<div class="card">
<div class="card-header"> About you </div>
<div class="card-body">
<p>Name:{{Auth::user()->name}}</p>
<p>Email:{{Auth::user()->email}}</p>
<p>Address:{{Auth::user()->profile->address}}</p>
<p>Phone Number:{{Auth::user()->profile->phone_number}}</p>
<p>Gender:{{Auth::user()->profile->gender}}</p>
<p>Bio:{{Auth::user()->profile->bio}}</p>
<p>Member since:{{date('F d Y',strtotime(Auth::user()->created_at))}}</p>

<!-- this gets the authorized users information-->
<!-- you can pull data from the profile table by establishing a relationship in the users model with the profile model -->


@if(!empty(Auth::user()->profile->cover_letter))
<!-- 1. if the authenticated users profile table cover_letter is not empty/does have a cover_letter -->

<p><a href="{{Storage::url( 
   
    Auth::user()->profile->cover_letter)}}">Cover letter </a></p>
    <!-- 2. Then put authenticated profile cover_letter url link from the storage folder -->
    <!-- You must put the Storage folder in the public directory. php artisan storage:link -->
    
@else 
<p>Please upload cover letter</p>
<!-- 3. If it is empty then diplay this message-->

@endif

@if(!empty(Auth::user()->profile->resume))
<!-- 1. if the authenticated users profile table cover_letter is not empty/does have a resume -->

<p><a href="{{Storage::url( 
   
    Auth::user()->profile->resume)}}">Resume</a></p>
    <!-- 2. Then put authenticated profile resume url link from the storage folder -->
    <!-- You must put the Storage folder in the public directory. php artisan storage:link -->
    
@else 
<p>Please upload Resume</p>
<!-- 3. If it is empty then diplay this message-->

@endif
</div>
</div>

<form action="{{route('cover.letter')}}" method="POST" enctype="multipart/form-data">
<!-- this is the cover.letter route you declared in the routes folder -->

@csrf
<div class="card">
<div class="card-header"> Update coverletter </div>
<div class="card-body">
<input type="file" class="form-control" name="cover_letter">
<!-- you declared this in your UserController which you included a update action -->
<button class="btn btn-success" type="submit">Update</button>
@if($errors->has('cover_letter'))
    <div class="error">{{$errors->first('cover_letter')}}
    </div>
    @endif
</div>
</div>

</form>
<br>
<form action="{{route('resume')}}" method="POST" enctype="multipart/form-data">
<!-- this is the cover.letter route you declared in the routes folder -->


@csrf
<div class="card">
<div class="card-header"> Update Resume </div>
<div class="card-body">
<input type="file" class="form-control" name="resume">
<!-- you declared this in your UserController which you included a update action -->
<button class="btn btn-success" type="submit">Update</button>
    
@if($errors->has('resume'))
    <div class="error">{{$errors->first('resume')}}
    </div>
    @endif

</div>
</div>

</form>
</div>
</div>






@endsection
