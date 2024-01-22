

<?php $__env->startSection('content'); ?>

<h3><b>Sto'llar ro'yxati</b></h3>
<hr>


<div class="row">
    <?php $__empty_1 = true; $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card col-md-2 d-flex m-1 bg-warning" >
            <img src="<?php echo e(asset('1.jpg')); ?>"  class="img-thumbnail w-100 my-1" alt="..." >
            <div class="card-body d-flex flex-column align-center justify-content-betwen">
                <h6 class="text-center"><b><i><?php echo e($table->table_number); ?>-stol</i></b></h6>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                <a href="<?php echo e(route('service.create',$table->table_number)); ?>" class="btn btn-primary"><small>Buyurtma</small></a>
                <a href="<?php echo e(route('service.show.order',$table->table_number)); ?>" class="btn btn-success"><small>Buyurtmani ko'rish</small></a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <?php endif; ?>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\Fastfood.uz\fasts.uz\resources\views/service/index.blade.php ENDPATH**/ ?>