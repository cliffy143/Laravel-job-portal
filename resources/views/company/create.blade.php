@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-2">
    @if(empty(Auth::user()->company->logo))
    <img src="{{asset('avatar/serwman1.jpg')}}" style="width: 100%;">
    <!-- if the authenticated user profile avatar is empty, display image  -->
    @else
    <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" style="width: 100%;">
    <!-- if its not empty  display  the authenticated users profile avatar-->

    @endif
    <br>
    <br>
    <form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data"><!-- this is the company.logo route you declared in the routes folder -->
@csrf
<div class="card">
<div class="card-header"> Update Resume </div>
<div class="card-body">
<input type="file" class="form-control" name="company_logo">
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

    

<form method="POST" action="{{route('company.store')}}">
<!-- this is the route you declared in the routes folder you made it into a post route -->
@csrf


<div class="card-body">



<div class="form-group">
<label for="">Address</label>
<input type="text" class="form-control" name="address" value="{{Auth::user()->company->address}}">
   
    <!-- this displays "The address field is required" when you dont put anything in the address field  -->
</div>

<div class="form-group">
<label for="">Phone</label>
<input type="text" class="form-control" name="phone" value="{{Auth::user()->company->phone}}">
   
    <!-- this displays "The address field is required" when you dont put anything in the address field  -->
</div>
<div class="form-group">
<label for="">Website</label>
<input type="text" class="form-control" name="website" value="{{Auth::user()->company->website}}" >
   
    <!-- this displays "The address field is required" when you dont put anything in the address field  -->
</div>
<div class="form-group">
<label for="">Slogan</label>
<input type="text" class="form-control" name="slogan" value="{{Auth::user()->company->slogan}}">
   
    <!-- this displays "The address field is required" when you dont put anything in the address field  -->
</div>


<div class="form-group">
<label for="">Description</label>
   <textarea name="description" type="text" class="form-control" value="{{Auth::user()->company->description}}"></textarea>
    <!-- this displays "The address field is required" when you dont put anything in the address field  -->
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
<div class="card-header"> About your company </div>
<div class="card-body">


<p>Company Name:{{Auth::user()->company->cname}}</p>
<p>address:{{Auth::user()->company->address}}</p>
<p>Company phone:{{Auth::user()->company->phone}}</p>
<p> website:<a href="{{Auth::user()->company->website}}"> {{Auth::user()->company->website}}</a></p>

<p>Company slogan:{{Auth::user()->company->slogan}}</p>
<p>Company Page:<a href="company/{{Auth::user()->company->slug}}">View</a></p>
<!-- this goes to the company page once you click the view link-->

</div>
</div>

<form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data">
<!-- this is the cover.letter route you declared in the routes folder -->

@csrf
<div class="card">
<div class="card-header"> Update Cover Photo </div>
<div class="card-body">
<input type="file" class="form-control" name="cover_photo">
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

</div>
</div>






@endsection
