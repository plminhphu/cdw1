<?php /* C:\wamp64\www\CDW1\resources\views/layouts/app.blade.php */ ?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title>Worldskills Travel</title>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/assets/bootstrap/css/bootstrap.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/assets/style.css')); ?>">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <header>
                <nav class="navbar-default navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="<?php echo e(url('/')); ?>" class="navbar-brand">Worldskills Travel</a>
                        </div>
                        <div class="collapse navbar-collapse" id="main-navbar">
                            <ul class="nav navbar-nav navbar-right">
                                <!-- Authentication Links -->
                                <?php if(auth()->guard()->guest()): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                                <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                                <?php endif; ?>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(url('flights')); ?>" role="button">
                                        Flights
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(url('/profile')); ?>" role="button">
                                        <?php echo e(Auth::user()->name); ?>

                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="post" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <main>
                <div class="container">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </main>
            <footer>
                <div class="container">
                    <p class="text-center">
                        Copyright &copy; 2019 | All Right Reserved
                    </p>
                </div>
            </footer>
        </div>
        <!--scripts-->
        <script type="text/javascript" src="<?php echo e(asset('public/assets/jquery-3.2.1.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('public/assets/bootstrap/js/bootstrap.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('public/js/app.js')); ?>"></script>
    </body>
</html>
