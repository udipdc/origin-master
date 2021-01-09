

<?php $__env->startSection('content'); ?>
<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <?php if(session()->has('error')): ?>
                        <p class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo e(session('error')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </p>
                    <?php endif; ?>
                    <?php if(session()->has('message')): ?>
                        <p class="alert alert-success alert-dismissible fade show" role="alert"><?php echo e(session('message')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </p>
                    <?php endif; ?>
                    <?php if(session()->has('status')): ?>
                        <p class="alert alert-success alert-dismissible fade show" role="alert"><?php echo e(session('status')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </p>
                    <?php endif; ?>
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <div class="text-center"> 
                                <?php if(isset(settingData()->site_logo) && !empty(settingData()->site_logo)): ?>
                                    <a href="<?php echo e(route('admin.login')); ?>"><img src="<?php echo e(asset('front/images/Logo/'.settingData()->site_logo)); ?>" alt="brand-logo"></a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('admin.login')); ?>"><img src="<?php echo e(asset('front/images/Logo/MedicalLogo.jpg')); ?>" alt=""></a>
                                <?php endif; ?>
                            </div>
                            <form method="POST" id="adminForgPassForm" action="<?php echo e(route('password.email')); ?>" class="mt-5 mb-5">
                                <?php echo csrf_field(); ?>

                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email Address">
                                        <span class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                        </span>
                                    </div>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <button class="btn login-form__btn submit w-100"><?php echo e(__('Send Password Reset Link')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js-script'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $.validator.addMethod("pwcheck", function(value) {
            return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d#@$!%*?&]{8,}$/.test(value)
        });
        $.validator.addMethod("email", function(value) {
            return /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(value)
        });
        $("#adminForgPassForm").validate({
            ignore:[],
            errorClass:"invalid-feedback animated fadeInDown",
            errorElement:"div",
            rules: {
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                email: {
                    required: "Please enter your email address",
                    email: "Please enter valid email address",
                },
            },
            errorPlacement:function(e,a){
                $(a).parents(".form-group").append(e)
            },
            highlight:function(e){
                $(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
            },
            success:function(e){
                $(e).closest(".form-group").removeClass("is-invalid"),$(e).remove()
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.auth.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pratapbhai_bharad\resources\views/admin/auth/email.blade.php ENDPATH**/ ?>