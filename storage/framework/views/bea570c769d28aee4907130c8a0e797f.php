

<?php $__env->startSection('content'); ?>

<form class="card p-3"> 
  <div class=" form-group">
    <label for="exampleInputEmail1" class="m-2">Sizning (+<?php echo e($phone); ?>) telefoningizga kod jo'natildi</label>
    <input type="number" class="form-control m-2" id="exampleInputEmail1"  placeholder="Enter kod">
    <small id="emailHelp" class="form-text text-muted m-2">3 daqiqa ichida kodni kiritishingizni so'raymiz</small>
  </div>
  <button type="submit" class="btn btn-primary m-2">Jo'natish</button>
</form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\OSPanel\domains\fastfood2.uz\fastfood\resources\views/verify_phone.blade.php ENDPATH**/ ?>