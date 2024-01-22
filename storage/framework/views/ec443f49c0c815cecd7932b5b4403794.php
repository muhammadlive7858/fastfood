

<?php $__env->startSection('content'); ?>

<h3><b>Taomni tahrirlash</b></h3>
<hr>

<form action="<?php echo e(route('service.update.order')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('POST'); ?>
    <div class="row">
            <div class="card col-md-2 d-flex m-1 bg-warning" >
                <input type="hidden" name="table" value="<?php echo e($table); ?>">
                <input type="hidden" name="food" value="<?php echo e($food->id); ?>">
                <img src="<?php echo e(asset($food->image)); ?>"  class="img-thumbnail w-100 my-1" alt="..." >
                <div class="card-body d-flex flex-column align-center justify-content-betwen">
                <h6 class="card-title text-center"><b><i><?php echo e($food->name); ?></i></b></h6>
                <p class=""><b><i>Narxi:<?php echo e($food->price); ?> so'm</i></b></p>
                <input type="number" class="form-control" name="count" value="<?php echo e($count); ?>">
                </div>
            </div>
    </div>
    <button class="btn btn-primary"><b><i>O'zgarishni saqlash</b></i></button>
</form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\Fastfood.uz\fasts.uz\resources\views/service/editorder.blade.php ENDPATH**/ ?>