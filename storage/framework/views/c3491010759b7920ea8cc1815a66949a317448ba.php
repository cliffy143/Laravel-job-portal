<?php $__env->startSection('content'); ?>
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
<?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <!--alias for jobs database name will be job. Must reference job opposed to jobs.  -->



<tr>
<td><img src="<?php echo e(asset('avatar/man.jpg')); ?>" width="80"></td>
<td>position:<?php echo e($job->position); ?>

<br>
<i class="fas fa-clock"><?php echo e($job->type); ?></i>

</td>
<td> <i class="fas fa-map"></i>Address:<?php echo e($job->address); ?></td>
<td><?php echo e($job->created_at->diffForHumans()); ?>

<i class="fas fa-globe"></i>
</td>

<td>
<a href="<?php echo e(route('jobs.show',[$job->id,$job->slug])); ?>" >

<!-- your linking to the jobs/show blade file -->
<!-- jobs.show route you referenced in your route folder -->
<!-- your url is going to have the $job id and slug -->


<button class="btn btn-success btn-ssm">Apply</button></td>
</a>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
</div>
<div>
<a href="<?php echo e(route('alljobs')); ?>">
<button class="btn btn-success btn-lg" style="width: 100%;">Browse all jobs</button></a>
<br><br>
<h1>Featured Companies</h1>
</div>

<div class="container">
<div class="row">
<?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-3">
<div class="card" style="width: 18rem;">
<img src="<?php echo e(asset('uploads/logo')); ?>/<?php echo e($company->logo); ?>" width="80">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo e($company->cname); ?></h5>
    <p class="card-text"><?php echo e(\Illuminate\Support\Str::limit($company->description,20)); ?></p>
    <!-- thi will limit the characters to 20  -->
    <a href="<?php echo e(route('company.index',[$company->id,$company->slug])); ?>" class="btn btn-primary">Visit Company</a>
  <!-- this matches the route, you are getting the company id and the company slug -->
  </div>
</div>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\blog\resources\views/welcome.blade.php ENDPATH**/ ?>