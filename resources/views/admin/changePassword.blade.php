@extends('admin.layouts.app')

@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
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
                            <form class="form-valide" method="post" action="{{route('admin.updatePassword')}}" enctype="multipart/form-data" id="chnagePasswordForm">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12 mb-3">
                                        <label>Current Password <span class="text-danger">*</span></label>
                                        <div class="input-group">                                
                                            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter your current password" value="{{old('old_password')}}">
                                            <div class="input-group-prepend">
                                                <span toggle="#old_password" class="input-group-text field-icon toggle-password"><i class="fa fa-eye"></i></span>
                                            </div>
                                        </div>  
                                        @error('old_password')
                                            <span class="text-danger" role="alert">  {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label>New Password <span class="text-danger">*</span></label>                               
                                        <div class="input-group"> 
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your new password" value="{{old('password')}}">
                                            <div class="input-group-prepend">
                                                <span toggle="#password" class="input-group-text field-icon toggle-password"><i class="fa fa-eye"></i></span>
                                            </div>
                                        </div>  
                                        @error('password')
                                           <span class="text-danger" role="alert">  {{ $message }}  </span>
                                        @enderror
                                    </div>                           
                                    <div class="form-group col-md-6 mb-3">
                                         <label>Confirm Password <span class="text-danger">*</span></label> 
                                        <div class="input-group">                                
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter your confirm password" value="{{old('password_confirmation')}}">
                                            <div class="input-group-prepend">
                                                <span toggle="#password_confirmation" class="input-group-text field-icon toggle-password"><i class="fa fa-eye"></i></span>
                                            </div>
                                        </div>  
                                        @error('password_confirmation')
                                            <span class="text-danger" role="alert">  {{ $message }}  </span>
                                        @enderror
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
@endsection
@section('page-js-script')
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
@endsection