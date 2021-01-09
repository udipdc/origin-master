<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <title>Medical Store</title>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="format-detection" content="telephone=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/css/main.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/css/custom.css')); ?>">
    <link href="<?php echo e(asset('plugins/toastr/css/toastr.min.css')); ?>" rel="stylesheet">
    <!-- sweet-alert -->
    <link href="<?php echo e(asset('plugins/sweetalert/css/sweetalert.css')); ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" />

    <!-- Date picker -->
    <link href="<?php echo e(asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">


    <link href="<?php echo e(asset('admin/css/style.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style type="text/css">
        .links .nav-link:hover{
            color: #ffffff !important;
            font-weight: 600 !important;
        }
        a#menu1.dropdown-toggle.toggle-link.nav-link.headerImage::before{
            right: -10%;
        }
    </style>

</head>
<body class="bg-offwhite">
    <header class="bg-white">
        <div class="container m-mb-20">

            <div class="d-flex align-items-center flex-lg-nowrap flex-wrap">
                <div class="nav-brand d-flex justify-content-center align-items-center w-100 position-relative">
                    <div class="link-home d-flex justify-content-between w-100">
                        <div class="logo-wrap d-flex flex-column">
                            <?php if(isset(settingData()->site_logo) && !empty(settingData()->site_logo)): ?>
                                <?php if(Auth::user()): ?>
                                    <a href="<?php echo e(url('/')); ?>" class="logo_header"><img class="p-0" src="<?php echo e(asset('front/images/Logo/'.settingData()->site_logo)); ?>" alt="brand-logo"></a>
                                <?php else: ?>
                                    <a href="<?php echo e(url('/')); ?>" class="logo_header"><img class="p-0" src="<?php echo e(asset('front/images/Logo/'.settingData()->site_logo)); ?>" alt="brand-logo"></a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="<?php echo e(url('/')); ?>" class="logo_header"><img class="p-0" src="<?php echo e(asset('front/images/Logo/MedicalLogo.jpg')); ?>" alt="brand-logo"></a>
                            <?php endif; ?>              
                        </div>
                        <div>
                            <a class="hamburger-wrapper navbar-toggle" data-toggle="collapse" data-target=".links">
                                <div class="line-wrapper">
                                <span class="hamburger first"></span>
                                <span class="hamburger middle"></span>
                                <span class="hamburger last"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php if(auth()->guard('web')->check()): ?>
                    <ul class="links collapse navbar-collapse d-flex justify-content-end flex-column flex-lg-row downArrow">
                        <li class="link-li">
                            <a class="dashboard_link nav-link <?php echo e((request()->is('nurse/dashboard')) ? 'active' : ''); ?>" href="<?php echo e(route('nurse.dashboard')); ?>">Dashboard</a>
                        </li>
                        <li class="link-li">
                            <a class="job_link nav-link <?php echo e((request()->is('application')) ? 'active' : ''); ?>" href="<?php echo e(route('application')); ?>">Apply For Job</a>
                        </li>
                        <li class="link-li">
                            <a class="upload_link nav-link <?php echo e((request()->is('nurse/uploadCredentials')) ? 'active' : ''); ?>" href="<?php echo e(route('uploadCredentials.index')); ?>">Upload Credentials</a>
                        </li>
                        <!-- start old remove. -->
                        <!-- <li class="auth-center dropdown dropdown_link link-li ss">
                            <?php if(isset(Auth::user()->firstname) && !empty(Auth::user()->firstname)): ?>
                                <a class="dropdown-toggle toggle-link nav-link headerLogo d-flex align-items-center justify-content-center rounded-circle text-white" id="menu1" data-toggle="dropdown" href="#">
                                    <?php //echo HeaderNameData(Auth::user()->firstname." ".Auth::user()->lastname); ?>
                                </a>
                            <?php endif; ?>
                            <?php if(empty(Auth::user()->firstname)): ?>
                                <a class="dropdown-toggle toggle-link nav-link headerLogo d-flex align-items-center justify-content-center rounded-circle" id="menu1" data-toggle="dropdown" href="#">
                                    <img class="img-fluid p-0" src="<?php echo e(asset('front/images/userLogo.png')); ?>" alt="">
                                </a>
                            <?php endif; ?>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li role="presentation">
                                    <a role="menuitem" tabindex="-1" class="dropdown-item" href="<?php echo e(route('nurse.profile')); ?>">
                                        <i class="fa fa-user" aria-hidden="true"></i> <span>Profile</span>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" tabindex="-1" class="dropdown-item" href="<?php echo e(route('nurse.settings')); ?>">
                                        <i class="fa fa-cog" aria-hidden="true"></i> <span>Settings</span>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" tabindex="-1" class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                        <i class="fa fa-lock" aria-hidden="true"></i> <span>Logout</span>
                                    </a>
                                </li>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </ul>
                        </li> -->
                        <!-- end old remove. -->

                        <li class="auth-center dropdown dropdown_link link-li ss text-center">
                            <div class="btn-group" role="menu" aria-labelledby="menu1">
                                <?php
                                    $userLetter = HeaderNameData(Auth::user()->firstname." ".Auth::user()->lastname);
                                ?>
                                <?php if(isset($userLetter) && !empty($userLetter)): ?>
                                    <button class="dropdown-toggle toggle-link nav-link headerLogo d-flex align-items-center justify-content-center rounded-circle text-white" id="menu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($userLetter); ?>

                                </button>
                                <?php endif; ?>
                                <?php if(empty($userLetter)): ?>
                                    <button class="dropdown-toggle toggle-link nav-link headerLogo d-flex align-items-center justify-content-center rounded-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="img-fluid p-0" src="<?php echo e(asset('front/images/userLogo.png')); ?>" alt="">
                                    </button>
                                <?php endif; ?>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                    <ul>
                                        <li role="presentation">
                                            <a role="menuitem" tabindex="-1" class="dropdown-item" href="<?php echo e(route('nurse.profile')); ?>">
                                                <i class="fa fa-user" aria-hidden="true"></i> <span>Profile</span>
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a role="menuitem" tabindex="-1" class="dropdown-item" href="<?php echo e(route('nurse.settings')); ?>">
                                                <i class="fa fa-cog" aria-hidden="true"></i> <span>Settings</span>
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a role="menuitem" tabindex="-1" class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                                <i class="fa fa-lock" aria-hidden="true"></i> <span>Logout</span>
                                            </a>
                                        </li>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="links collapse navbar-collapse d-flex justify-content-end flex-column flex-lg-row">
                        <li class="link-li">
                            <a class="upload_link nav-link <?php echo e((request()->is('application')) ? 'active' : ''); ?>" href="<?php echo e(route('application')); ?>">Apply For Job</a>
                        </li>
                        <li class="link-li">
                            <a class="dashboard_link nav-link <?php echo e((request()->is('login')) ? 'active' : ''); ?>" href="<?php echo e(route('login')); ?>">Login</a>
                        </li>
                        <li class="link-li">
                            <a class="job_link nav-link <?php echo e((request()->is('register')) ? 'active' : ''); ?>" href="<?php echo e(route('register')); ?>">Register</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>

        </div>
    </header>
    <?php echo $__env->yieldContent('content'); ?>

	<!-- <script src="<?php echo e(asset('front/js/jquery.min.js')); ?>"></script> -->
    <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js" type="text/javascript"></script>
	<script src="<?php echo e(asset('front/js/input.js')); ?>"></script>
	<script src="<?php echo e(asset('front/scss/vendor/datepicker/moment.min.js')); ?>"></script>
	<script src="<?php echo e(asset('front/scss/vendor/datepicker/daterangepicker.js')); ?>"></script>
	<!-- <script src="<?php echo e(asset('front/js/bootstrap.bundle.min.js')); ?>"></script> -->
	<script src="<?php echo e(asset('front/js/bootstrap_select.js')); ?>"></script>
	<script src="<?php echo e(asset('plugins/toastr/js/toastr.min.js')); ?>"></script>


    <script src="<?php echo e(asset('plugins/sweetalert/js/sweetalert.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>


	<script src="<?php echo e(asset('front/js/fastclick.js')); ?>"></script>
	<script src="<?php echo e(asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>


    <!-- <script src="<?php echo e(asset('plugins/common/common.min.js')); ?>"></script> -->
    <script src="<?php echo e(asset('admin/js/custom.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/settings.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/gleek.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/styleSwitcher.js')); ?>"></script>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<!-- <script src="<?php echo e(asset('front/js/global.js')); ?>"></script> -->
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

        $(function () {
            /*print success msgs*/
            if(typeof success_msg !== 'undefined'){
                toastr.success(success_msg,{timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1})
            }
            /*print error msgs*/
            if(typeof error_msg !== 'undefined'){
                toastr.error(error_msg,{positionClass:"toast-top-right",timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
            }
        });

	</script>
	<?php echo $__env->yieldContent('page-js-script'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\pratapbhai_bharad\resources\views/auth/layouts/app.blade.php ENDPATH**/ ?>