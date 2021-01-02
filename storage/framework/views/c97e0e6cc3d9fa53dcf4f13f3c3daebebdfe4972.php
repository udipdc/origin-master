
<?php $__env->startSection('content'); ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form id="category_form" name="category_form" action="<?php if(!isset($category)): ?> <?php echo e(route('category.store')); ?> <?php else: ?> <?php echo e(route('category.update',$category->id)); ?> <?php endif; ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($category)): ?>
                                 <?php echo e(method_field('PATCH')); ?>

                            <?php endif; ?>
                            <div class="form-group">
                                <label for="name">Category Name <span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo (isset($category)) ? $category->name : "" ?>" class="form-control" name="name" />
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <label id="name-error" class="text-danger" for="name"> <?php echo e($message); ?></label>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo e((isset($category))?"Update":"Submit"); ?></button>
                        </form>
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
      $("#category_form").validate({
          ignore: ":hidden:not(textarea)",
          errorClass:"invalid-feedback animated fadeInDown",
          errorElement:"div",
          rules: {
              name: "required",
          },
          messages: {
              name: "Please Enter Category Name",
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MedicalStore\resources\views/admin/category/add_edit.blade.php ENDPATH**/ ?>