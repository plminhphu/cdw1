<?php /* C:\wamp64\www\CDW1\resources\views/auth/login.blade.php */ ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-6 col-md-push-3">
        <h2>Log in to your account</h2>
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="post" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="control-label">Email Address:</label>
                        <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                        <?php if($errors->has('email')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password:</label>
                        <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                        <?php if($errors->has('password')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" checked="true" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                           <label class="form-check-label" for="remember">
                        <?php echo e(__('Remember Me')); ?>

                    </label>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Log In</button>
<!--                        <?php if(Route::has('password.request')): ?>
                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                            <?php echo e(__('Forgot Your Password?')); ?>

                        </a>
                        <?php endif; ?>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>