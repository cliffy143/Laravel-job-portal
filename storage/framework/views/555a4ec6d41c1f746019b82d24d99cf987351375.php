<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script defer src="<?php echo e(asset('js/app.js')); ?>"></script>

    <!-- defer specifies that the script is executed when the page has finished parsing -->

  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">




    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            
                            
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('employer.register')); ?>"><?php echo e(__('Employer Register')); ?></a>
                                </li>
                            
                            
                                <?php if(Route::has('login')): ?>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Job Seeker Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                        <?php if(Auth::user()->user_type=='employer'): ?>

<li>
    <a href="<?php echo e(route('job.create')); ?>"><button class="btn btn-secondary">Post a job</button></a>
</li>
<?php endif; ?>
                            <li class="nav-item dropdown">


                            
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <?php if(Auth::user()->user_type=='employer'): ?>
                                   <!-- if your the authenticated user/employer -->
                                   <?php echo e(Auth::user()->company->cname); ?>

 
                                   <!-- display the company cname -->
                                   

                                   <?php else: ?>
                                    <?php echo e(Auth::user()->name); ?>

                                    <!-- if not display the autneticated users name -->
                                    <?php endif; ?>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <?php if(Auth::user()->user_type=='employer'): ?>
                                  <!-- if your the athenticated employer  display content below -->
                                <a class="dropdown-item" href="<?php echo e(route('company.view')); ?>">
                                       
                                        <?php echo e(__('Company')); ?>

                                    </a>

                                    <a class="dropdown-item" href="<?php echo e(route('my.job')); ?>">
                                    My Jobs


                                    </a>

                                    <a class="dropdown-item" href="<?php echo e(route('applicant')); ?>">Applicants</a>

                                    <?php else: ?>
                                    <!-- if not display this content below -->
                                    <a class="dropdown-item" href="<?php echo e(route('user.profile')); ?>">
                                       
                                        <?php echo e(__('profile')); ?>

                                    </a>
                                    <?php endif; ?>
                                  <!-- this will add a new drop down menu tab named company  -->
                                  
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\wamp64\www\blog\resources\views/layouts/app.blade.php ENDPATH**/ ?>