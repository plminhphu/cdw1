<?php /* C:\wamp64\www\CDW1\resources\views/auth/register.blade.php */ ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-6 col-md-push-3">
        <h2>Join as a Wordskills Travel Member</h2>
        <div class="panel panel-default">
            <div class="panel-body">
                <form role="form" method="post" action="<?php echo e(route('register')); ?>">
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
                        <label class="control-label">Name:</label>
                        <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required>
                        <?php if($errors->has('name')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('name')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Phone:</label>
                        <input id="phone" type="tel" class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" name="phone" value="<?php echo e(old('phone')); ?>" required>
                        <?php if($errors->has('phone')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('phone')); ?></strong>
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
                    <div class="form-group">
                        <label class="control-label">Confirmation Password:</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>