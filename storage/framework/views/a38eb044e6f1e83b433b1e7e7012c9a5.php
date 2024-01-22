

<?php $__env->startSection('content'); ?>

<h3><b>Taom yaratish</b></h3>
<hr>

<form method="POST" action="<?php echo e(route('food.store')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
  <div class="form-group">
    <label for="exampleInputEmail1" class="m-1">Taom nomi:</label>
    <input name="name" type="text" class="form-control"  placeholder="" require>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" class="m-1">Kategoriya tanlash:</label>
    <select name="category" id="" class="form-control">
        <option value="">Tanlash</option>
        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        <?php endif; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" class="m-1">Taom rasmi:</label>
    <input name="image" type="file" class="form-control"  placeholder="" require>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1 " class="m-1">Malumot</label>
    <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
    <textarea name="description" id="" cols="100" rows="10" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1 " class="m-1">Narx</label>
    <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
    <input type="number" class="form-control" name="price" placeholder="Taom narxi:">
  </div>
  <button type="submit" class="btn btn-primary m-2">Submit</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\Fastfood.uz\fasts.uz\resources\views/foods/create.blade.php ENDPATH**/ ?>