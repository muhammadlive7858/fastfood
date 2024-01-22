

<?php $__env->startSection('content'); ?>

<h3><b>Oshpazlar ro'yxati</b></h3>
<hr>

<div class="row">
<?php $__empty_1 = true; $__currentLoopData = $chefs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chef): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="card col-md-3">
    <img class="card-img-top img-thumbnail" style="" src="<?php echo e($chef->image); ?>" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title"><?php echo e($chef->name); ?></h4>
        <p class="card-text"><?php echo e($chef->description); ?>.</p>
    </div>
    <div class="row">
        <a href="<?php echo e(route('chef.edit',$chef->id)); ?>" class="btn btn-primary col-md-6 mx-2 my-1">Tahrirlash</a>
        <form action="<?php echo e(route('chef.destroy',$chef->id)); ?>" method="post" class="col-md-5 my-1">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button class="btn btn-danger">O'chirish</button>
        </form>
    </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<?php endif; ?>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\Fastfood.uz\fasts.uz\resources\views/chefs/index.blade.php ENDPATH**/ ?>