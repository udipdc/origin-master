
<?php $__env->startSection('content'); ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form id="blog_form" name="blog_form" action="<?php if(!isset($blog)): ?> <?php echo e(route('blog.store')); ?> <?php else: ?> <?php echo e(route('blog.update',$blog->id)); ?> <?php endif; ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($blog)): ?>
                                 <?php echo e(method_field('PATCH')); ?>

                            <?php endif; ?>

                            <div class="form-group">
                                <label for="blog_name">Blog Name <span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo (isset($blog)) ? $blog->blog_name : "" ?>" class="form-control" name="blog_name" />
                                <?php $__errorArgs = ['blog_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <label id="blog_name-error" class="text-danger" for="blog_name"> <?php echo e($message); ?></label>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="blog_link">Blog Link <span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo (isset($blog)) ? $blog->blog_link : "" ?>" class="form-control" name="blog_link" />
                                <?php $__errorArgs = ['blog_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <label id="blog_link-error" class="text-danger" for="blog_link"> <?php echo e($message); ?></label>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="blog_details">Blog Details <span class="text-danger">*</span></label>
                                <textarea class="form-control h-150px" rows="6" id="blog_details" name="blog_details"><?php echo (isset($blog)) ? $blog->blog_details : "" ?></textarea>
                                <?php $__errorArgs = ['blog_details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <label id="blog_details-error" class="text-danger" for="blog_details"> <?php echo e($message); ?></label>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label class="" for="val-skill">Blog Image</label>
                                <div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="blog_image" name="blog_image">
                                        <label class="custom-file-label" for="customFile">Choose blog_image Image</label>
                                    </div>
                                    <input type="hidden" name="old_blog_image" id="old_blog_image" <?php if(isset($blog)): ?>
                                        value="<?php echo e($blog->blog_image); ?>" <?php endif; ?>>
                                    <?php if(isset($blog) && $blog->blog_image != '' && $blog->blog_image != null): ?>
                                    <span class="pip">
                                        <img src="<?php echo e(url('blogs/'.$blog->blog_image)); ?>" class="preview-img"
                                            alt="User Image" /><br>
                                        <span class="remove">Remove image</span></span>
                                    </span>
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['blog_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                      <label id="blog_image-error" class="text-danger" for="blog_image"> <?php echo e($message); ?></label>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary"><?php echo e((isset($blog))?"Update":"Submit"); ?></button>
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
      $("#blog_form").validate({
          ignore: ":hidden:not(textarea)",
          errorClass:"invalid-feedback animated fadeInDown",
          errorElement:"div",
          rules: {
              blog_name: "required",
              blog_link: "required",
              blog_details: "required",
              blog_image: {
                extension: "jpg|jpeg|png|JPG|JPEG|PNG",
              },
          },
          messages: {
              blog_name: "Please Enter Blog Name",
              blog_link: "Please Enter Blog Link",
              blog_details: "Please Enter Blog Details",
              blog_image: {
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
          $("#blog_image").on("change", function(e) {
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
                          "</span>").insertAfter("#blog_image");
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
    $('#old_blog_image').val('');
    $('#old_img').val('');
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pratapbhai_bharad\resources\views/admin/blog/add_edit.blade.php ENDPATH**/ ?>