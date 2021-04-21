@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">

<form action="{{route('alljobs')}}" method="GET">

<div class="form-inline">
        <div class="form-group">
            <label>keyword&nbsp;</label>
            <input type="text" name="title" class="form-control" placeholder="job position">&nbsp;&nbsp;&nbsp;
        </div>
        <div class="form-group">
            <label>Employment &nbsp;</label>
            <select class="form-control" name="type">
                    <option value="">-select-</option>
                    <option value="fulltime">fulltime</option>
                    <option value="parttime">parttime</option>
                    <option value="casual">casual</option>
                </select>
                &nbsp;&nbsp;
        </div>
        <div class="form-group">
            <label>category</label>
            <select name="category_id" class="form-control">
            <!-- the name has to match the table name -->
                <option value="">-select-</option>

                    @foreach(App\models\Category::all() as $cat)
                    <!-- you must give the category model an alias  -->
                    
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        <!-- make the value the id of the category -->
                    @endforeach
                </select>
                &nbsp;&nbsp;
        </div>

        <div class="form-group">
            <label>address</label>
            <input type="text" name="address" class="form-control" placeholder="address">&nbsp;&nbsp;
        </div>
        
        <div class="form-group">
            <input type="submit" class="btn btn-search btn-primary btn-block" value="Search">

        </div>
    </div>    <br>

    </form>

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
{{$jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links()}}
<!-- this is for pagination -->

</div>



</div>







@endsection


