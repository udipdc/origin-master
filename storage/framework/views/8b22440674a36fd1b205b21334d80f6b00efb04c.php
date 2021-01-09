
<?php $__env->startSection('content'); ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form id="admin_contact_form" name="admin_contact_form" action="<?php echo e(route('blog.contactImage')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('PATCH')); ?>


                            <div class="form-group">
                                <label class="" for="val-skill">Contact Image</label>
                                <div>
                                    <div class="custom-file" style="width: 80%;">
                                        <input type="file" class="custom-file-input" id="contact_image" name="contact_image">
                                        <label class="custom-file-label" for="customFile">Choose contact image Image</label>
                                    </div>
                                    <br/>
                                    <input type="hidden" name="old_contact_image" id="old_contact_image" <?php if(isset($userData)): ?>
                                        value="<?php echo e($userData->contact_image); ?>" <?php endif; ?>>
                                    <?php if(isset($userData) && $userData->contact_image != '' && $userData->contact_image != null): ?>
                                    <span class="pip">
                                        <img src="<?php echo e(url('front/images/'.$userData->contact_image)); ?>" class="preview-img" alt="ContactUs Image" /><br>
                                        <span class="remove">Remove image</span></span>
                                    </span>
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['contact_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                      <label id="contact_image-error" class="text-danger" for="contact_image"> <?php echo e($message); ?></label>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
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
      $("#admin_contact_form").validate({
          ignore: ":hidden:not(textarea)",
          errorClass:"invalid-feedback animated fadeInDown",
          errorElement:"div",
          rules: {
              contact_image: {
                required: "#old_contact_image:blank",
                extension: "jpg|jpeg|png|JPG|JPEG|PNG",
              },
          },
          messages: {
              contact_image: {
                required: "Please Select Contact Image",
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
          $("#contact_image").on("change", function(e) {
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
                          "</span>").insertAfter("#contact_image");
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
    $('#old_contact_image').val('');
    $('#old_img').val('');
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pratapbhai_bharad\resources\views/admin/admin_contact_page.blade.php ENDPATH**/ ?>