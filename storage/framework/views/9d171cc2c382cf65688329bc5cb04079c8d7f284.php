
<?php $__env->startSection('content'); ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form id="product_form" name="product_form" action="<?php if(!isset($product)): ?> <?php echo e(route('product.store')); ?> <?php else: ?> <?php echo e(route('product.update',$product->id)); ?> <?php endif; ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($product)): ?>
                                 <?php echo e(method_field('PATCH')); ?>

                            <?php endif; ?>

                            <div class="form-group">
                                <label for="name">Product Name <span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo (isset($product)) ? $product->product_name : "" ?>" class="form-control" name="name" />
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

                            <div class="form-group">
                                <label class="" for="val-skill">Product Image</label>
                                <div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="product_image" name="product_image">
                                        <label class="custom-file-label" for="customFile">Choose product_image Image</label>
                                    </div>
                                    <input type="hidden" name="old_product_image" id="old_product_image" <?php if(isset($product)): ?>
                                        value="<?php echo e($product->product_image); ?>" <?php endif; ?>>
                                    <?php if(isset($product) && $product->product_image != '' && $product->product_image != null): ?>
                                    <span class="pip">
                                        <img src="<?php echo e(url('product/'.$product->product_image)); ?>" class="preview-img"
                                            alt="User Image" /><br>
                                        <span class="remove">Remove image</span></span>
                                    </span>
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['product_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                      <label id="product_image-error" class="text-danger" for="product_image"> <?php echo e($message); ?></label>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary"><?php echo e((isset($product))?"Update":"Submit"); ?></button>
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
      $("#product_form").validate({
          ignore: ":hidden:not(textarea)",
          errorClass:"invalid-feedback animated fadeInDown",
          errorElement:"div",
          rules: {
              name: "required",
              product_image: {
                extension: "jpg|jpeg|png|JPG|JPEG|PNG",
              },
          },
          messages: {
              name: "Please Enter Product Name",
              product_image: {
                extension: "Please select image format.(eg: jpg|jpeg|png|JPG|JPEG|PNG)",
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

      if (window.File && window.FileList && window.FileReader) {
          $("#product_image").on("change", function(e) {
              var files = e.target.files,
                  filesLength = files.length;
              for (var i = 0; i < filesLength; i++) {
                  var f = files[i]
                  var fileReader = new FileReader();
                  fileReader.onload = (function(e) {
                      var file = e.target;
                      $('.pip').html('');
                      $("<span class=\"pip\">" +
                          "<img class=\"preview-img\" src=\"" + e.target.result +
                          "\" title=\"" + file.name + "\"/>" +
                          "<br/><span class=\"remove\">Remove image</span>" +
                          "</span>").insertAfter("#product_image");
                  });
                  fileReader.readAsDataURL(f);
              }
          });
      } else {
          alert("Your browser doesn't support to File API")
      }

    });

$(document).on('click', '.remove', function() {
    $(".pip").remove();
    $('#product_image').val('');
    $('#old_img').val('');
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MedicalStore\resources\views/admin/product/add_edit.blade.php ENDPATH**/ ?>