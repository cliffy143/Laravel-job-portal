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
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\laravel\blog\resources\views/welcome.blade.php ENDPATH**/ ?>