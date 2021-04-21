@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Applicants</h1>
    <div class="row justify-content-center">
        <div class="col-md-12"> 

          @foreach($applications as $application)

            <div class="card">
                <div class="card-header"><a href="{{route('jobs.show',[$application->id,$application->slug])}}"> {{$application->title}}</a></div>

                <div class="card-body">
                    @foreach($application->users as $user)
                       
            <table class="table" style="width: 100%;">
            <thead class="thead-dark">
            </thead>
            <tbody>
            <tr>
                <td>
                @if ($user && $user->profile && $user->profile->avatar)
                                        <img src="{{asset('uploads/avatar')}}/{{$user->profile->avatar}}" width="80">
                    @else
                    <img src="{{asset('uploads/avatar/man.jpg')}}" width="80">
                    @endif

            <br>Applied on:{{ date('F d, Y', strtotime($application->created_at)) }}
                </td>
              <td>Name:{{$user->name}}</td>
      <td>Email{{$user->email}}</td>
      <td>Address:{{$user->profile->address}}</td>
      <td>Gender{{$user->profile->gender}}</td>
      <td>Experience:{{$user->profile->experience}}</td>
      <td>Bio:{{$user->profile->bio}}</td>
      <td>Phone:{{$user->profile->phone_number}}</td>

      <td><a href="{{Storage::url($user->profile->resume)}}">Resume</a></td>

      <td><a href="{{Storage::url($user->profile->cover_letter)}}">Cover letter</a></td>
      <td></td>

    </tr>
    
  </tbody>
</table>

                   </div><br><br>
                    @endforeach
                </div> 
                <br>
                 @endforeach


            </div>

        </div>
    </div>
</div>
@endsection