@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-md-12">
       <div class="company-profile">

       @if(empty($company->cover_photo))
<!-- if  company cover_photo is empty, display content below -->

<img src="{{asset('cover/tumblr.png')}}" style="width: 100%;">


@else
<!--  or else, display this content below -->
<img src="{{asset('uploads/coverphoto')}}/{{$company->cover_photo}}" class="col-md-12" style="height: 10%;">
<!-- this images is referencing the storage/uploads/coverphoto folder. Also, the company cover_photo in the database -->

@endif


<div class="company-desc">

@if(empty(Auth::user()->company->logo))
    <img src="{{asset('avatar/serwman1.jpg')}}" style="width: 50%;">
    <!-- if the authenticated user company's logo is empty, display image  -->
    @else
    <img src="{{asset('uploads/logo')}}/{{$company->logo}}" style="width: 20%;">
    <!-- if its not empty  display  the authenticated users profile avatar-->

    @endif<!-- this images are in your public folder -->
<p> {{$company->description}}</p>
<h1>{{$company->cname}}</h1>
<!-- you declared what the $company variable is in the CompanyController -->
<p>Slogan-{{$company->slogan}}&nbsp; Address-{{$company->address}}&nbsp; Phone-{{$company->phone}}&nbsp; Website-{{$company->website}}&nbsp; </p>
       </div>
       </div>
       <table class="table">
<thead>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
</thead>
<tbody>
<!-- creates 10  -->
@foreach($company->jobs as $job)
<!-- this will fetch jobs posted by this company -->
<!-- without the $company "error of undefined variable" because this is in the compnay folder in the company controller -->
 <!--alias for jobs database name will be job. Must reference job opposed to jobs.  -->



<tr>
<td><img src="{{asset('avatar/man.jpg')}}" width="80"></td>
<td>position:{{$job->position}}
<br>
<i class="fas fa-clock">{{$job->type}}</i>

</td>
<td> <i class="fas fa-map"></i>Address:{{$job->address}}</td>
<td>{{$job->created_at->diffForHumans()}}
<i class="fas fa-globe"></i>
</td>

<td>
<a href="{{route('jobs.show',[$job->id,$job->slug])}}" >

<!-- your linking to the jobs/show blade file -->
<!-- jobs.show route you referenced in your route folder -->
<!-- your url is going to have the $job id and slug -->


<button class="btn btn-success btn-ssm">Apply</button></td>
</a>
</tr>
@endforeach
</tbody>
</table>
        </div>
    </div>

@endsection
