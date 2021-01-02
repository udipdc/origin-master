@extends('admin.layouts.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="setting_form" name="setting_form" action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-skill">Site Logo <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="site_logo" name="site_logo">
                                    <label class="custom-file-label" for="customFile">Choose Site Logo</label>
                                  </div>
                                  <input type="hidden" name="old_site_logo" id="old_site_logo" @if(isset($data)) value="{{$data->site_logo}}" @endif>
                                    @if(isset($data) && $data->site_logo != '' && $data->site_logo != null)
                                      <span class="logo-pip">
                                        <img src="{{url('front/images/Logo/'.$data->site_logo)}}" class="logo-preview-img" alt="User Image" /><br>
                                        <span class="remove">Remove image</span></span>
                                      </span>
                                    @endif
                                    @error('site_logo')
                                      <label id="site_logo-error" class="text-danger" for="site_logo"> {{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-skill">PDF Template
                                </label>
                                <div class="col-lg-6">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input upload-input" id="pdf_template" name="pdf_template">
                                    <label class="custom-file-label" for="customFile">Choose PDF Template</label>
                                    <div class="file-upload-filename"> @if(isset($data) && !empty($data->pdf_template)) File name: {{ explode('_',$data->pdf_template)[1] }}@endif </div>
                                  </div>
                                  <input type="hidden" name="old_pdf_template" id="old_pdf_template" @if(isset($data)) value="{{$data->pdf_template}}" @endif>
                                    @error('pdf_template')
                                      <label id="pdf_template-error" class="text-danger" for="pdf_template"> {{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="footer_text">Footer Text <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="footer_text" name="footer_text" placeholder="Enter Footer Text" @if(isset($data)) value="{{$data->footer_text}}" @else value="{{old('footer_text')}}" @endif>
                                    @error('footer_text')
                                      <label id="footer_text-error" class="text-danger" for="footer_text"> {{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                                
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js-script')
<script type="text/javascript">
$(document).ready(function() {
    $("#setting_form").validate({
        ignore: [],
        errorClass: "invalid-feedback animated fadeInDown",
        errorElement: "div",
        errorPlacement: function(e, a) {
            jQuery(a).parents(".form-group > div").append(e)
        },
        highlight: function(e) {
            jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
        },
        success: function(e) {
            jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
        },
        rules: {
            footer_text: "required",
            site_logo: {
                required: "#old_site_logo:blank",
                extension: "jpg|jpeg|png|svg|JPG|JPEG|PNG|SVG",
            },
            pdf_template: {
              extension: "pdf|PDF",  
            }
        },
        messages: {
            footer_text: "Please enter footer text",
            site_logo: {
                required: "Please upload your site logo",
                extension: "Please select logo in format.(eg: jpg|jpeg|png|svg|JPG|JPEG|PNG|SVG)",
            },
            pdf_template: {
                extension: "Please select template in format.(eg: pdf|PDF)",
            },
        }
    });
    
    if (window.File && window.FileList && window.FileReader) {
        $("#site_logo").on("change", function(e) {
            var files = e.target.files,
                filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $('.logo-pip').html('');
                    $("<span class=\"logo-pip\">" +
                        "<img class=\"logo-preview-img\" src=\"" + e.target.result +
                        "\" title=\"" + file.name + "\"/>" +
                        "<br/><span class=\"remove\">Remove image</span>" +
                        "</span>").insertAfter("#site_logo");
                });
                fileReader.readAsDataURL(f);
            }
        });
    } else {
        alert("Your browser doesn't support to File API")
    }
});

$(document).on('change','.upload-input',function(){
    // console.log($(this).attr('id'))
    var fileName = $(this)[0].files[0].name;
    $(this).parent().find(".file-upload-filename").text('File name: ' + fileName)
})

$(document).on('click', '.remove', function() {
    $(".logo-pip").remove();
    $('#site_logo').val('');
    $('#old_site_logo').val('');
});
</script>
@endsection