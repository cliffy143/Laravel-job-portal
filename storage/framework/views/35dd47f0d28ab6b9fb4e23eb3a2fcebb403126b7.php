
<?php $__env->startSection('content'); ?>
<div class="container">
<div class="row">

<form action="<?php echo e(route('alljobs')); ?>" method="GET">

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

                    <?php $__currentLoopData = App\models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- you must give the category model an alias  -->
                    
                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                        <!-- make the value the id of the category -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo e($jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links()); ?>

<!-- this is for pagination -->

</div>



</div>







<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\blog\resources\views/jobs/alljobs.blade.php ENDPATH**/ ?>