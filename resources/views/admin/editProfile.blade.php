@extends('admin.layouts.app')

@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Profile</li>
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
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="form-validation">
                            <form class="form-valide" method="post" action="{{route('admin.update')}}" enctype="multipart/form-data" id="editProfileForm">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="firstname">First Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" @if(isset($data)) value="{{$data->firstname}}" @else value="{{old('firstname')}}" @endif>
                                        @error('firstname')
                                            <label id="firstname-error" class="text-danger" for="firstname"> {{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="lastname">Last Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name" @if(isset($data)) value="{{$data->lastname}}" @else value="{{old('lastname')}}" @endif>
                                        @error('lastname')
                                            <label id="lastname-error" class="text-danger" for="lastname"> {{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" @if(isset($data)) value="{{$data->email}}" @else value="{{old('email')}}" @endif>
                                        @error('email')
                                            <label id="email-error" class="text-danger" for="email"> {{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="dob">Date Of Birth <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                      <div class="input-group">
                                        <input type="text" class="form-control" id="dob" name="dob" placeholder="Enter Date Of birth" @if(isset($data) && !empty($data->dob)) value="{{date('d-m-Y',strtotime($data->dob))}}" @else value="{{old('dob')}}" @endif> <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>
                                      </div>
                                        @error('dob')
                                           <label id="dob-error" class="text-danger" for="dob"> {{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">Username <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" @if(isset($data)) value="{{$data->username}}" @else value="{{old('username')}}" @endif>
                                        @error('username')
                                          <label id="username-error" class="text-danger" for="username"> {{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Profile
                                    </label>
                                    <div class="col-lg-6">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="profile" name="profile">
                                        <label class="custom-file-label" for="customFile">Choose profile Image</label>
                                      </div>
                                      <input type="hidden" name="old_img" id="old_img" @if(isset($data)) value="{{$data->profile}}" @endif>
                                        @if(isset($data) && $data->profile != '' && $data->profile != null)
                                          <span class="pip">
                                            <img src="{{url('images/users/'.$data->profile)}}" class="preview-img" alt="User Image" /><br>
                                            <span class="remove">Remove image</span></span>
                                          </span>
                                        @endif
                                        @error('profile')
                                          <label id="profile-error" class="text-danger" for="profile"> {{ $message }}</label>
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
    <!-- #/ container -->
</div>
@endsection
@section('page-js-script')
<script type="text/javascript">
    $(document).ready(function() {
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        $('#dob').datepicker({
            dateFormat: 'dd-mm-yy',
            maxDate: today,
            changeMonth: true,
            changeYear: true,
            yearRange: "c-100:c+100",
            autoclose: true,
            todayHighlight: true
        });
        $.validator.addMethod("email", function(value) {
            return /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(value)
        });
        $("#editProfileForm").validate({
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
                firstname: "required",
                lastname: "required",
                email: {
                    required: true,
                    email: true
                },
                username: {
                    required: true,
                    minlength: 4
                },
                profile:{
                   extension: "jpg|jpeg|png|JPG|JPEG|PNG",
                },
                dob: {
                  required: true
                }
            },
            messages: {
                firstname: "Please enter firstname",
                lastname: "Please enter lastname",
                phone_code: "Please enter phone code",
                email: {
                  required: "Please enter email address",
                  email: "Please enter valid email",
                },
                username: {
                    required: "Please enter username",
                    minlength: "Your login name must consist of at least 4 characters"
                },
                profile:{
                   extension: "Please select image format.(eg: jpg|jpeg|png|JPG|JPEG|PNG)",
                },
                dob : {
                    required : "Please select your date of birth"
                },
            }
        });

        if (window.File && window.FileList && window.FileReader) {
            $("#profile").on("change", function(e) {
              var files = e.target.files,
                filesLength = files.length;
              for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                  var file = e.target;
                  $('.pip').html('');
                  $("<span class=\"pip\">" +
                    "<img class=\"preview-img\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                    "<br/><span class=\"remove\">Remove image</span>" +
                    "</span>").insertAfter("#profile");
                });
                fileReader.readAsDataURL(f);
              }
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
    });
    $(document).on('click','.remove',function(){
        $(".pip").remove();
        $('#profile').val('');
        $('#old_img').val('');
    });
</script>
@endsection