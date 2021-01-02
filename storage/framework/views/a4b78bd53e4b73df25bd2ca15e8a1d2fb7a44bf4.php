

<?php $__env->startSection('content'); ?>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('admin')); ?>">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                      <div class="card-title">
                            <h4>Change Password</h4>
                        </div>
                        <div class="form-validation">
                            <form class="form-valide" method="post" action="<?php echo e(route('admin.updatePassword')); ?>" enctype="multipart/form-data" id="chnagePasswordForm">
                                <?php echo csrf_field(); ?>
                                <div class="form-row">
                                    <div class="form-group col-md-12 mb-3">
                                        <label>Current Password <span class="text-danger">*</span></label>
                                        <div class="input-group">                                
                                            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter your current password" value="<?php echo e(old('old_password')); ?>">
                                            <div class="input-group-prepend">
                                                <span toggle="#old_password" class="input-group-text field-icon toggle-password"><i class="fa fa-eye"></i></span>
                                            </div>
                                        </div>  
                                        <?php $__errorArgs = ['old_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger" role="alert">  <?php echo e($message); ?> </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label>New Password <span class="text-danger">*</span></label>                               
                                        <div class="input-group"> 
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your new password" value="<?php echo e(old('password')); ?>">
                                            <div class="input-group-prepend">
                                                <span toggle="#password" class="input-group-text field-icon toggle-password"><i class="fa fa-eye"></i></span>
                                            </div>
                                        </div>  
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                           <span class="text-danger" role="alert">  <?php echo e($message); ?>  </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>                           
                                    <div class="form-group col-md-6 mb-3">
                                         <label>Confirm Password <span class="text-danger">*</span></label> 
                                        <div class="input-group">                                
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter your confirm password" value="<?php echo e(old('password_confirmation')); ?>">
                                            <div class="input-group-prepend">
                                                <span toggle="#password_confirmation" class="input-group-text field-icon toggle-password"><i class="fa fa-eye"></i></span>
                                            </div>
                                        </div>  
                                        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger" role="alert">  <?php echo e($message); ?>  </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                    <button type="submit" class="float-right btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js-script'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $.validator.addMethod("pwcheck", function(value) {
            return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d#@$!%*?&]{8,}$/.test(value)
        });
        $("#chnagePasswordForm").validate({
            ignore: [],
            errorClass: "invalid-feedback animated fadeInDown",
            errorElement: "div",
            rules: {
                old_password : "required",
                password: {
                    required: true,
                    pwcheck:true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    pwcheck:true,
                    minlength: 8,
                    equalTo: "#password"
                }
            },
            messages: {
                old_password: "Please enter current password",
                password: {
                    required: "Please enter new password",
                    pwcheck : "Password must contain atleast 1 uppercase, 1 lowercase, 1 digit and 1 special character, 8 characters long",
                    minlength: "Password must be at least 8 characters long"
                },
                password_confirmation:{
                    required: "Please enter confirm password",
                    pwcheck : "Password must contain atleast 1 uppercase, 1 lowercase, 1 digit and 1 special character, 8 characters long",
                    minlength: "Password must be at least 8 characters long",
                    equalTo : "Password and confirm password must be same"
                }
            },
            errorPlacement: function(e, a) {
                jQuery(a).parents(".form-group > div").append(e)
            },
            highlight: function(e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
            },
            success: function(e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
            },
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MedicalStore\resources\views/admin/changePassword.blade.php ENDPATH**/ ?>