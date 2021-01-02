<?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<!--*******************
    Preloader end
********************-->
    
<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">
    <!-- Navbar -->
    <?php echo $__env->make('admin.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main Sidebar Container -->
    <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    

    <?php echo $__env->yieldContent('content'); ?>

    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <?php if(isset(settingData()->footer_text) && !empty(settingData()->footer_text)): ?>
                <p> <?php echo e(settingData()->footer_text); ?> </p>
            <?php else: ?>
                <p>Copyright &copy; Reserved by <a href="https://themeforest.net/user/quixlab">MedicalLogo</a> 2020</p>
            <?php endif; ?>

        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->
<?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\MedicalStore\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>