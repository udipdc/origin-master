<!--**********************************
    Sidebar start
***********************************-->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label"><?php echo e(Auth::guard('admin')->user()->firstname.' '.Auth::guard('admin')->user()->lastname); ?> </li>
            <li>
                <a class="" href="<?php echo e(route('admin.dashboard')); ?>" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li class="<?php echo activeMenuLink('blog.index,blog.create'); ?>">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-certificate menu-icon"></i><span class="nav-text">Blog</span>
                </a>
                <ul class="<?php echo activeLinkMenuOpen('blog.index,blog.create'); ?>" aria-expanded="false">
                    <li class="<?php echo activeMenuLink('blog.index'); ?>"><a class="nav-text" href="<?php echo e(route('blog.index')); ?>"> <i class="fa fa-eye"></i>View Blog</a></li>
                    <li class="<?php echo activeMenuLink('blog.create'); ?>"><a class="nav-text" href="<?php echo e(route('blog.create')); ?>"> <i class="fa fa-plus"></i>Add Blog</a></li>
                </ul>
            </li>

            <li class="<?php echo activeMenuLink('gallery.index,gallery.create'); ?>">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-image menu-icon"></i><span class="nav-text">Gallery</span>
                </a>
                <ul class="<?php echo activeLinkMenuOpen('gallery.index,gallery.create'); ?>" aria-expanded="false">
                    <li class="<?php echo activeMenuLink('gallery.index'); ?>"><a class="nav-text" href="<?php echo e(route('gallery.index')); ?>"> <i class="fa fa-eye"></i>View Gallery</a></li>
                    <li class="<?php echo activeMenuLink('gallery.create'); ?>"><a class="nav-text" href="<?php echo e(route('gallery.create')); ?>"> <i class="fa fa-plus"></i>Add Gallery</a></li>
                </ul>
            </li>

            <li>
                <a class="" href="<?php echo e(route('blog.contactChange')); ?>" aria-expanded="false">
                    <i class="fa fa-user"></i><span class="nav-text">ContactUs Image</span>
                </a>
            </li>

        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
<?php /**PATH C:\xampp\htdocs\pratapbhai_bharad\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>