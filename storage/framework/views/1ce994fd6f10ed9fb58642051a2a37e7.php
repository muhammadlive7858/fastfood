

<?php $__env->startSection('content'); ?>


<div class="pagetitle">
  <h1>Sozlamalar sahifasi:</h1>
  <?php echo e($location->countryName); ?>

  <div>
    <form action="<?php echo e(route('setting.update',$setting->id)); ?>" method="POST" class="row">
        <?php echo csrf_field(); ?>
        <label for=""  class="col-md-7">
            <span>Kashbek foizi:</span>
            <input class="form-control" type="number" name="cashback" value="<?php echo e($setting->cashback); ?>">
        </label>
        <label for="" class="col-md-7">
            <span>Sahifalash soni:</span>
            <input class="form-control" type="number" name="pagination" value="<?php echo e($setting->pagination); ?>">
        </label>
        <label for="" class="col-md-7">
            <span><b>Joylashuvingiz kenglik:</b><?php echo e($location->latitude); ?></span>
            <input class="form-control" type="number" name="location_lat" value="<?php echo e($setting->location_lat); ?>">
        </label>
        <label for="" class="col-md-7">
            <span><b>Joylashuvi uzunlik:</b><?php echo e($location->longitude); ?></span>
            <input class="form-control" type="number" name="location_lang" value="<?php echo e($setting->location_lang); ?>">
        </label>
        <p style="color:red">Kenglik va uzunlik telegram bot ximoyalanishi uchun zarur!</p>
        <button class="btn btn-primary col-md-1">Saqlash</button>
    </form>
  </div>
</div><!-- End Page Title -->





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\OSPanel\domains\fastfood2.uz\fastfood\resources\views/setting/index.blade.php ENDPATH**/ ?>