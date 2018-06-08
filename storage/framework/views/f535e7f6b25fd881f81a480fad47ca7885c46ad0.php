<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Log in</h1>

        <?php if(session()->has('message')): ?>
            <div class="alert alert-danger">
                <?php echo e(session()->get('message')); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="/admin/login">

            <?php echo e(csrf_field()); ?>


            <div class="form-group">
                <label>Email: </label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label>password: </label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Log in</button>
            </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.templates.templateFrontEnd', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>