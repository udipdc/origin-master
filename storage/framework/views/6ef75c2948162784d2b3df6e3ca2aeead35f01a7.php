

<?php $__env->startSection('content'); ?>


         <!-- Main Container  -->
         <div class="main-container">
            <div id="content">
               <div class="container">
                  <div class="box-content1">
                     <div class="module sohomepage-slider ">
                       <div class="yt-content-slider" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="no" data-loop="no" data-hoverpause="yes">
                           <div class="yt-content-slide">
                               <a href="#"><img src="image/catalog/slideshow/arseny-togulev-DE6rYp1nAho-unsplash.jpg" alt="slider1" class="img-responsive"></a>
                           </div>
                           <div class="yt-content-slide">
                               <a href="#"><img src="image/catalog/slideshow/hush-naidoo-yo01Z-9HQAw-unsplash.jpg" alt="slider2" class="img-responsive"></a>
                           </div>
                           <div class="yt-content-slide">
                               <a href="#"><img src="image/catalog/slideshow/marcel-scholte-LPurJnihmQI-unsplash.jpg" alt="slider2" class="img-responsive"></a>
                           </div>
                           <!-- <div class="yt-content-slide">
                               <a href="#"><img src="image/catalog/slideshow/home3/slide3.jpg" alt="slider3" class="img-responsive"></a>
                           </div> -->
                       </div>
                       <div class="loadeding"></div>
                     </div>
                  </div>
               </div>
               <div class="row-cates">
                  <!-- So categories -->
                  <div id="so_categories_31" class="so-categories module theme3 slider-cates container preset01-5 preset02-4 preset03-3 preset04-2 preset05-1">
                     <div class="pre_text">
                        Top featured collections           
                     </div>
                     <h3 class="modtitle"><span>Collections of blog</span></h3>
                     <div class="modcontent">
                        <div class="cat-wrap theme3">
                           <?php $__currentLoopData = $productList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="content-box">
                                 <div class="image-cat">
                                    <a href="#"><img src="<?php echo e(url('product/'.$product->product_image)); ?>" alt="image" width="208" height="243" /></a>
                                 </div>
                                 <br>
                                 <div class="cat-title">
                                    <a href="#" style="font-weight: 400;"><?php echo e($product->product_name); ?></a>
                                 </div>
                              </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <!-- <div class="content-box">
                              <div class="image-cat">                        
                                 <a href="#"><img src="image/catalog/small_slideshow/martha-dominguez.jpg" alt="image" /></a>
                              </div>
                              <div class="cat-title">
                                 <a href="#">Martha</a>
                              </div>
                           </div> -->
                        </div>
                     </div>
                  </div>
                  <!-- end So categories -->
               </div>
            </div>
         </div>
         <!-- //Main Container -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js-script'); ?>
    <script type="text/javascript"><?php if($message = Session::get('success')): ?> var success_msg = "<?php echo $message; ?>"; <?php endif; ?> <?php if($message = Session::get('error')): ?> var error_msg = "<?php echo $message; ?>"; <?php endif; ?></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MedicalStore\resources\views/welcome.blade.php ENDPATH**/ ?>