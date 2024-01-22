

<?php $__env->startSection('content'); ?>

<h3><b>Stol ro'yxati</b></h3>
<hr>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Raqami</th>
      <th scope="col">Amallar</th>
    </tr>
  </thead>
  <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <th scope="row" >1</th>
            <td class="w-25"><?php echo e($table->table_number); ?> - Stol</td>
            <td class="d-flex">
                <a href="<?php echo e(route('table.edit',$table->id)); ?>" class="btn btn-success mx-1">Tahrirlash</a>
                <form action="<?php echo e(route('table.destroy',$table->id)); ?>" method="POst">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger mx-1">O'chirish</button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <?php endif; ?>
  </tbody>
</table>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\Fastfood.uz\fasts.uz\resources\views/tables/index.blade.php ENDPATH**/ ?>