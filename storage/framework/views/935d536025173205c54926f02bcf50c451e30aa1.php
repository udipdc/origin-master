
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pratapbhai Bharad</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('admin/images/admin-small-logo.jpg')); ?>">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <!-- Custom Stylesheet -->
    <link href="<?php echo e(asset('admin/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/custom.css')); ?>" rel="stylesheet">

</head>

<body class="h-100">
    
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
    <?php echo $__env->yieldContent('content'); ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?php echo e(asset('plugins/common/common.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/custom.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/settings.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/gleek.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/styleSwitcher.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/validation/jquery.validate.min.js')); ?>"></script>
    <script type="text/javascript"><?php if($message = Session::get('success')): ?> var success_msg = "<?php echo $message; ?>"; <?php endif; ?> <?php if($message = Session::get('error')): ?> var error_msg = "<?php echo $message; ?>"; <?php endif; ?></script>
    <script type="text/javascript">
        $(document).on('click','.toggle-password', function() {
            $(this).find('i').toggleClass('fa-eye fa-eye-slash');
                let input = $($(this).attr('toggle'));
            if (input.attr('type') == 'password') {
                input.attr('type', 'text');
            }
            else {
                input.attr('type', 'password');
            }
        });
    </script>
    <?php echo $__env->yieldContent('page-js-script'); ?>
</body>
</html>





<?php /**PATH C:\xampp\htdocs\pratapbhai_bharad\resources\views/admin/auth/layouts/app.blade.php ENDPATH**/ ?>