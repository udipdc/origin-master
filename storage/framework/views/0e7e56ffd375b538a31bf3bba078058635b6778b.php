<!--**********************************
    Nav header start
***********************************-->
<div class="nav-header">
    <div class="brand-logo">
        <a href="<?php echo e(route('admin.dashboard')); ?>">
            <b class="logo-abbr"><img src="<?php echo e(asset('admin/images/admin-small-logo.jpg')); ?>" alt=""> </b>
            <span class="logo-compact"><img src="<?php echo e(asset('front/images/Logo/userImage.png')); ?>" alt=""></span>
            <span class="brand-title">
                <img src="<?php echo e(asset('front/images/Logo/userImage.png')); ?>" class="userImage" alt="">
            </span>
        </a>
    </div>
</div>
<!--**********************************
    Nav header end
***********************************-->

<!--**********************************
    Header start
***********************************-->
<div class="header">    
    <div class="header-content clearfix">
        
        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                        <span class="activity active"></span>
                         <?php if(isset(Auth::user()->profile) && !empty(Auth::user()->profile)): ?>
                         <img src="<?php echo e(asset('images/users/'.Auth::user()->profile)); ?>" height="40" width="40" alt="">
                        <?php else: ?>
                          <img src="<?php echo e(asset('admin/images/user/')); ?>/1.png" height="40" width="40" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body ">
                            <ul>
                                <li>
                                    <a class="admin-drop-link" href="<?php echo e(route('admin.edit')); ?>"><i class="icon-user"></i> <span>Profile</span></a>
                                </li>
                                <li>
                                    <a class="admin-drop-link" href="<?php echo e(route('admin.changePassword')); ?>"><i class="icon-key"></i> <span>Change Password</span></a>
                                </li>
                                <li><a class="admin-drop-link" href="<?php echo e(route('admin.logout')); ?>" onclick="event.preventDefault();  document.getElementById('logout-form').submit();"><i class="icon-lock"></i> <span>Logout</span></a></li>
                                <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--**********************************
    Header end ti-comment-alt
***********************************<?php /**PATH C:\xampp\htdocs\pratapbhai_bharad\resources\views/admin/layouts/navbar.blade.php ENDPATH**/ ?>