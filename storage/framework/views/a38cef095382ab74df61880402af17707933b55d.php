

<?php $__env->startSection('content'); ?>
<div class="container">
<div class="col-md-12">
       <div class="company-profile">
<img src="<?php echo e(asset('cover/tumblr.png')); ?>" style="width: 100%;">
<div class="company-desc">
<img src="<?php echo e(asset('avatar/serwman1.jpg')); ?>" style="width: 15%;">
<!-- this images are in your public folder -->
<p> <?php echo e($company->description); ?></p>
<h1><?php echo e($company->cname); ?></h1>
<!-- you declared what the $company variable is in the CompanyController -->
<p>Slogan-<?php echo e($company->slogan); ?>&nbsp; Address-<?php echo e($company->address); ?>&nbsp; Phone-<?php echo e($company->phone); ?>&nbsp; Website-<?php echo e($company->website); ?>&nbsp; </p>
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
<?php $__currentLoopData = $company->jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- this will fetch jobs posted by this company -->
<!-- without the $company "error of undefined variable" -->
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\laravel\blog\resources\views/company/index.blade.php ENDPATH**/ ?>