<?php $__env->startSection('content'); ?>

<h3><b>Taomlar ro'yxati</b></h3>
<p><i><?php echo e($id); ?> - Stol uchun buyurtma</i></p>
<hr>

<form action="<?php echo e(route('service.create.order')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('POST'); ?>
    <input type="hidden" name="table_number" value="<?php echo e($id); ?>">
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card col-md-2 d-flex m-1 bg-warning" >
                <input type="hidden" name="food[]" value="<?php echo e($food->id); ?>">
                <img src="<?php echo e(asset($food->image)); ?>"  class="img-thumbnail w-100 my-1" alt="..." >
                <div class="card-body d-flex flex-column align-center justify-content-betwen">
                <h6 class="card-title text-center"><b><i><?php echo e($food->name); ?></i></b></h6>
                <p class=""><b><i>Narxi:<?php echo e($food->price); ?> so'm</i></b></p>
                <input type="number" class="form-control" name="count[]" value="0">
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        <?php endif; ?>
    </div>
    <button class="btn btn-primary"><b><i>Buyurtmani saqlash</b></i></button>
</form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\Fastfood.uz\fasts.uz\resources\views/service/order.blade.php ENDPATH**/ ?>