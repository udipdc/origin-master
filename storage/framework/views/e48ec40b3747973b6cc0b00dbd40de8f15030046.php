
<?php $__env->startSection('content'); ?>
<section class="blog-section">
  <div class="container">

      <p class="page-description">
          See what is cooking in pur website <br> We got some interesting topics just for you
      </p>

      <div class="blog-box iso-call">
          <!-- Pratapbhai Bharad -->
          <?php $__currentLoopData = $blogImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="blog-post">
                  <img src="<?php echo e(url('blogs/'.$value->blog_image)); ?>" alt="<?php echo e($value->blog_image); ?>">
                  <div class="hover-post">
                      <h2>
                          <a href="<?php echo e($value->blog_link); ?>"><?php echo e($value->blog_name); ?></a>
                      </h2>
                  </div>
              </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="center-button">
          <?php echo $blogImages->render(); ?>

      </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pratapbhai_bharad\resources\views/blog.blade.php ENDPATH**/ ?>