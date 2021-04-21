

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
    <div class="col-md-2">
    <img src="<?php echo e(asset('avatar/serwman1.jpg')); ?>" width="100">
    </div>
    <div class="col-md-6">
    <div class="card">
    <div class="card-header">Update Your Profile</div>

<form method="post" action="<?php echo e(route('profile.create')); ?>">
<?php echo csrf_field(); ?>


<div class="card-body">



<div class="form-group">
<label for="">Address</label>
<input type="text" class="form-control" name="address">
    
</div>



<div class="form-group">
<label for="">Experience</label>
<textarea name="experience" class="form-control">

<?php echo e(Auth::user()->profile->experience); ?>


</textarea>
    </div>



<div class="form-group">
<label for="">Bio</label>
<textarea name="bio" class="form-control">
 <?php echo e(Auth::user()->profile->bio); ?> 

</textarea>
    </div>



<div class="form-group">
<button class="btn btn-success" type="submit">Update</button>
</div>



</div>

</div>
<?php if(Session::has('message')): ?>
<div class="alert alert-sucess">
<?php echo e(Session::get('message')); ?>

</div>
<?php endif; ?>
</div>

</form>
<div class="col-md-4">
<div class="card">
<div class="card-header"> About you </div>
<div class="card-body">
<p>Name:<?php echo e(Auth::user()->name); ?></p>
<p>Email:<?php echo e(Auth::user()->email); ?></p>
<p>Address:<?php echo e(Auth::user()->profile->address); ?></p>
<p>Gender:<?php echo e(Auth::user()->profile->gender); ?></p>
<p>Bio:<?php echo e(Auth::user()->profile->bio); ?></p>
<p>Member since:<?php echo e(date('F d Y',strtotime(Auth::user()->created_at))); ?></p>

<!-- this gets the authorized users information-->
<!-- you can pull data from the profile table by establishing a relationship in the users model with the profile model -->
</div>
</div>

<form action="<?php echo e(route('cover.letter')); ?>" method="post" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<div class="card">
<div class="card-header"> Update coverletter </div>
<div class="card-body">
<input type="file" class="form-control" name="cover_letter">
<button class="btn btn-success" type="submit">Update</button>
</div>
</div>

</form>
</div>
</div>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\laravel\blog\resources\views/profile/index.blade.php ENDPATH**/ ?>