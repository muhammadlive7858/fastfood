<?php $__env->startSection('content'); ?>

<div class="alert alert-danger" role="alert">
  <?php echo e($message); ?>

</div>
<a href="<?php echo e(route('user.index')); ?>" class="btn btn-success">Malumotlarni to'ldirish</a>
<?php if($phone): ?>
    <a href="<?php echo e(route('verify.phone')); ?>" class="btn btn-danger">Telefon raqamni tekshirish</a>
<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\OSPanel\domains\fastfood2.uz\fastfood\resources\views/dashboard.blade.php ENDPATH**/ ?>