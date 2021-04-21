@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<h1>Recent Jobs</h1>
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
@foreach($jobs as $job)
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
<div>
<a href="{{route('alljobs')}}">
<button class="btn btn-success btn-lg" style="width: 100%;">Browse all jobs</button></a>
<br><br>
<h1>Featured Companies</h1>
</div>

<div class="container">
<div class="row">
@foreach($companies as $company)
<div class="col-md-3">
<div class="card" style="width: 18rem;">
<img src="{{asset('uploads/logo')}}/{{$company->logo}}" width="80">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$company->cname}}</h5>
    <p class="card-text">{{\Illuminate\Support\Str::limit($company->description,20)}}</p>
    <!-- thi will limit the characters to 20  -->
    <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">Visit Company</a>
  <!-- this matches the route, you are getting the company id and the company slug -->
  </div>
</div>

</div>
@endforeach
</div>
</div>
</div>
@endsection


