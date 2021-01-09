
<?php $__env->startSection('content'); ?>
<section class="gallery-section">
  <div class="container">
      <div class="gallery-box iso-call col3">
          <!-- Pratapbhai Bharad -->
          <?php $__currentLoopData = $userImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="gallery-post">
                  <img src="<?php echo e(url('gallery/'.$value->image)); ?>" alt="<?php echo e($value->image); ?>">
                  <div class="hover-box">
                      <h2>
                          <a href="<?php echo e(url('gallery/'.$value->image)); ?>" alt="<?php echo e($value->image); ?>" class="image-popup"><?php echo e($value->image_name); ?></a>
                      </h2>
                  </div>
              </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="center-button">
          <?php echo $userImages->render(); ?>

      </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pratapbhai_bharad\resources\views/gallery.blade.php ENDPATH**/ ?>