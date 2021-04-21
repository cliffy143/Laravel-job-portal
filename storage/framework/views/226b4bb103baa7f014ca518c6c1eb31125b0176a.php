

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Your jobs</div>

                <div class="card-body">
                    
                    <table class="table">
            
            <tbody>
                
                <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                <?php if(empty(Auth::user()->company->logo)): ?>

                        <img src="<?php echo e(asset('avatar/man.jpg')); ?>" width="80">

        <?php else: ?>
        <img src="<?php echo e(asset('uploads/logo')); ?>/<?php echo e(Auth::user()->company->logo); ?>" width="80">


   <?php endif; ?>



                    </td>
                    <td>Position:<?php echo e($job->position); ?>

                        <br>
                        <i class="fa fa-clock-o"aria-hidden="true"></i>&nbsp;<?php echo e($job->type); ?>

                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address:<?php echo e($job->address); ?></td>
                    <!-- the declared job variable says to go to the job table where theres the user_id and authenticated users id and get that information, you defined in the job controller-->
                    <!--your then going to use the id information to grab the address for that authenticated user id -->

                    <td><i class="fa fa-globe"aria-hidden="true"></i>&nbsp;Date:<?php echo e($job->created_at->diffForHumans()); ?></td>
                    <td>
                        <a href="<?php echo e(route('jobs.show',[$job->id,$job->slug])); ?>">
                            <button class="btn btn-success btn-sm">     Read
                            </button>
                        </a>
                        <br><br>
                       <a href="<?php echo e(route('job.edit',[$job->id])); ?>"> <button class="btn btn-dark">Edit</button></a>
                        
                </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>


                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\blog\resources\views/jobs/myjob.blade.php ENDPATH**/ ?>