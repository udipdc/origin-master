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
            <!--<?php if(Auth::guard('admin')->user()->can('view_Role-Permission') || Auth::guard('admin')->user()->can('create_Role-Permission')): ?>
            <li class="<?php echo activeMenuLink('permission.index'); ?>">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-lock menu-icon"></i><span class="nav-text">Role & Permission</span>
                </a>
                <ul class="<?php echo activeLinkMenuOpen('permission.index'); ?>" aria-expanded="false">
                    <li class="<?php echo activeMenuLink('permission.index'); ?>"><a href="<?php echo e(route('permission.index')); ?>"> <i class="fa fa-eye"></i>Give Permissions</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(Auth::guard('admin')->user()->can('view_Category') || Auth::guard('admin')->user()->can('create_Category')): ?>
            <li class="<?php echo activeMenuLink('category.index,category.create'); ?>">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-certificate menu-icon"></i><span class="nav-text">Category</span>
                </a>
                <ul class="<?php echo activeLinkMenuOpen('category.index,category.create'); ?>" aria-expanded="false">
                    <?php if(Auth::guard('admin')->user()->can('view_Category')): ?>
                    <li class="<?php echo activeMenuLink('category.index'); ?>"><a href="<?php echo e(route('category.index')); ?>"> <i class="fa fa-eye"></i>View Category</a></li>
                    <?php endif; ?>
                    <?php if(Auth::guard('admin')->user()->can('create_Category')): ?>
                    <li class="<?php echo activeMenuLink('category.create'); ?>"><a href="<?php echo e(route('category.create')); ?>"> <i class="fa fa-plus"></i>Add Category</a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(Auth::guard('admin')->user()->can('create_Settings')): ?>
            <li class="<?php echo activeMenuLink('settings.create'); ?>">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-gear menu-icon"></i><span class="nav-text">Settings</span>
                </a>
                <ul class="<?php echo activeLinkMenuOpen('settings.create'); ?>" aria-expanded="false">
                    <?php if(Auth::guard('admin')->user()->can('create_Settings')): ?>
                    <li class="<?php echo activeMenuLink('settings.create'); ?>"><a href="<?php echo e(route('settings.create')); ?>"> <i class="fa fa-plus"></i>Add Settings</a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?> -->

            <?php if(Auth::guard('admin')->user()->can('view_Product') || Auth::guard('admin')->user()->can('create_Product')): ?>
            <li class="<?php echo activeMenuLink('product.index,product.create'); ?>">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-certificate menu-icon"></i><span class="nav-text">Product</span>
                </a>
                <ul class="<?php echo activeLinkMenuOpen('product.index,product.create'); ?>" aria-expanded="false">
                    <?php if(Auth::guard('admin')->user()->can('view_Product')): ?>
                    <li class="<?php echo activeMenuLink('product.index'); ?>"><a class="nav-text" href="<?php echo e(route('product.index')); ?>"> <i class="fa fa-eye"></i>View Product</a></li>
                    <?php endif; ?>
                    <?php if(Auth::guard('admin')->user()->can('create_Product')): ?>
                    <li class="<?php echo activeMenuLink('product.create'); ?>"><a class="nav-text" href="<?php echo e(route('product.create')); ?>"> <i class="fa fa-plus"></i>Add Product</a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>

        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
<?php /**PATH C:\xampp\htdocs\MedicalStore\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>