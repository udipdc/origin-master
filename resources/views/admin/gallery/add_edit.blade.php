@extends('admin.layouts.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form id="gallery_form" name="gallery_form" action="@if(!isset($gallery)) {{route('gallery.store')}} @else {{route('gallery.update',$gallery->id)}} @endif" method="POST" enctype="multipart/form-data">
                            @csrf
                            @isset($gallery)
                                 {{ method_field('PATCH')}}
                            @endisset

                            <div class="form-group">
                                <label for="image_name">Image Name <span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo (isset($gallery)) ? $gallery->image_name : "" ?>" class="form-control" name="image_name" />
                                @error('image_name')
                                    <label id="image_name-error" class="text-danger" for="image_name"> {{ $message }}</label>
                                 @enderror
                            </div>

                            <div class="form-group">
                                <label class="" for="val-skill">Image</label>
                                <div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="customFile">Choose Image</label>
                                    </div>
                                    <input type="hidden" name="old_image" id="old_image" @if(isset($gallery))
                                        value="{{$gallery->image}}" @endif>
                                    @if(isset($gallery) && $gallery->image != '' && $gallery->image != null)
                                    <span class="pip">
                                        <img src="{{url('gallery/'.$gallery->image)}}" class="preview-img"
                                            alt="User Image" /><br>
                                        <span class="remove">Remove image</span></span>
                                    </span>
                                    @endif
                                    @error('image')
                                      <label id="image-error" class="text-danger" for="image"> {{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">{{   (isset($gallery))?"Update":"Submit"  }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
@stop
@section('page-js-script')
<script type="text/javascript">
  $(document).ready(function() {
      $("#gallery_form").validate({
          ignore: ":hidden:not(textarea)",
          errorClass:"invalid-feedback animated fadeInDown",
          errorElement:"div",
          rules: {
              image_name: "required",
              image: {
                extension: "jpg|jpeg|png|JPG|JPEG|PNG",
              },
          },
          messages: {
              image_name: "Please Enter image Name",
              image: {
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
          $("#image").on("change", function(e) {
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
                          "</span>").insertAfter("#image");
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
    $('#old_gallery_image').val('');
    $('#old_img').val('');
});

</script>
@stop