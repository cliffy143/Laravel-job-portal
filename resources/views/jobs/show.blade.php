@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
   
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$job->title}}</div>

                <div class="card-body">
            
            
            <h3>Description</h3>      
<p> {{$job->description}}</p>
<h3>Duties</h3>
<p> {{$job->roles}}</p>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">short info</div>

                <div class="card-body">
                

               
    @if($job->company !== null)
        <p>Company: <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}"> {{$job->company->cname ?? ''}}</a></p>
    <!-- We have the id of the company and the slug of that company in the URL. Your Finding the company based on the slug and id. Makes this into a link -->
    <!-- pulls data from the company database in the cname table. Must have a id or it wont be able to find it -->
    @else
    <p>Company: Not Available</p>

     @endif
    <p>Address:{{$job->address}}</p>

    <p>Employement Type:{{$job->type}}</p>

    <p>Position:{{$job->position}}</p>

    <p>Date:{{$job->created_at->diffForHumans()}}</p>
    <p>Last date to apply:{{ date('F d, Y', strtotime($job->last_date)) }}</p>


    </div>
</div>

<br>
@if(Auth::check()&&Auth::user()->user_type='seeker')
<!-- You have established what seeker is in your Users table in your user_type column -->
@if(!$job->checkApplication())
<!-- if its not the check application method in job model display below -->
<!-- if it is the check application method in job model dont display below -->
<form action="{{route('apply',[$job->id])}}" method="POST">@csrf
<button type="submit" class="btn btn-success" style="width: 100%;">
Apply</button>
</form>

@if(Session::has('message'))
                 <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            @endif
@endif
<!-- This if auth is for if the user is a job seeker he can see the apply button if not seeker he cant see the apply button -->
</div>
@endsection
