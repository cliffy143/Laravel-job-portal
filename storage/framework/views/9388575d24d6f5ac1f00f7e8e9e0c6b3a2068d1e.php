

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e($job->title); ?></div>

                <div class="card-body">
            
            
            <h3>Description</h3>      
<p> <?php echo e($job->description); ?></p>
<h3>Duties</h3>
<p> <?php echo e($job->roles); ?></p>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">short info</div>

                <div class="card-body">
                

               
    <?php if($job->company !== null): ?>
        <p>Company: <a href="<?php echo e(route('company.index',[$job->company->id,$job->company->slug])); ?>"> <?php echo e($job->company->cname ?? ''); ?></a></p>
    <!-- We have the id of the company and the slug of that company in the URL. Finding company based on the slug and id. Makes this into a link -->
    <!-- pulls data from the company database in the cname table. Must have a id or it wont be able to find it -->
    <?php else: ?>
    <p>Company: Not Available</p>

     <?php endif; ?>
    <p>Address:<?php echo e($job->address); ?></p>

    <p>Employement Type:<?php echo e($job->type); ?></p>

    <p>Position:<?php echo e($job->position); ?></p>

    <p>Date:<?php echo e($job->created_at->diffForHumans()); ?></p>
   

    </div>
</div>

<br>
<?php if(Auth::check()&&Auth::user()->user_type='seeker'): ?>
<!-- You have established what seeker is in your Users table in your user_type column -->
<button class="btn btn-success" style="width: 100%;">
Apply</button>
<?php endif; ?>
<!-- This if auth is for if the user is a job seeker he can see the apply button if nto seeker he cant see the apply button -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\laravel\blog\resources\views/jobs/show.blade.php ENDPATH**/ ?>