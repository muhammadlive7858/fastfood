

<?php $__env->startSection('content'); ?>

<h3><b>Taomlar ro'yxati</b></h3>
<p><i><?php echo e($table); ?> - Stol uchun buyurtma</i></p>
<a href="<?php echo e(route('service.order.plus',$table)); ?>" class="btn btn-primary">Yangi taom qo'shish</a>
<a href="<?php echo e(route('service.order.destroy',$table)); ?>" class="btn btn-danger">Taomlarni tozalash</a>

<hr>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nomi</th>
      <th scope="col">Baxosi</th>
      <th scope="col">Soni</th>
      <th scope="col">Amallar</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $i = 1;
        $summa = 0;
    ?>
        <?php $__empty_1 = true; $__currentLoopData = $newdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <th scope="row"><?php echo e($i); ?></th>
            <td><?php echo e($data['name']); ?></td>
            <td><?php echo e($data['price']); ?></td>
            <td><?php echo e($data['count']); ?></td>
            <td>
                <form action="<?php echo e(route('service.edit.order')); ?> " method="get">
                    <input type="hidden" name="table" value="<?php echo e($table); ?>">
                    <input type="hidden" name="id" value="<?php echo e($data['id']); ?>" >
                    <input type="hidden" name="count" value="<?php echo e($data['count']); ?>" >

                    <button class="btn btn-primary">Tahrirlash</button>
                </form>
                <form action="<?php echo e(route('service.delete.food')); ?>" method="get">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="table" value="<?php echo e($table); ?>">
                    <input type="hidden" name="id" value="<?php echo e($data['id']); ?>" >
                    <input type="hidden" name="count" value="<?php echo e($data['count']); ?>" >

                    <button class="btn btn-danger">O'chirish</button>
                </form>
            </td>
        </tr>
        <?php
            $summa = $summa + ($data['price'] * $data['count']);
            $i++;
        ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        <?php endif; ?>
 
        <thead class="thead-dark">
            <tr>
                <th> - </th>
                <th scope="row">Jami:<?php echo e($i - 1); ?></th>
                <th>Summa:<?php echo e($summa); ?></th>
                <th> <a href="<?php echo e(route('order.create',$table)); ?>" class="btn btn-warning">Buyurtmani tugallash</a> </th>
                <th></th>
            </tr>
        </thead>
        
  </tbody>
</table>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\Fastfood.uz\fasts.uz\resources\views/service/showorder.blade.php ENDPATH**/ ?>