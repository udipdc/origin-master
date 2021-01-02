@extends('admin.auth.layouts.app')

@section('content')
<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <div class="text-center"> 
                                @if(isset(settingData()->site_logo) && !empty(settingData()->site_logo))
                                    <a href="{{ route('admin.login') }}"><img src="{{asset('front/images/Logo/'.settingData()->site_logo)}}" alt="brand-logo"></a>
                                @else
                                    <a href="{{ route('admin.login') }}"><img src="{{asset('front/images/Logo/MedicalLogo.jpg')}}" alt=""></a>
                                @endif
                                <br/><label>Set Password</label>
                            </div>
                        
                            <form class="form-valide" method="post" action="{{ route('admin.insertPassword', Crypt::encryptString($userID))}}" id="setPasswordForm">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12 mb-3">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ $user_data->email }}" readonly="readonly">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label>Password <span class="text-danger">*</span></label>                               
                                        <div class="input-group"> 
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" value="{{old('password')}}">
                                            <div class="input-group-prepend">
                                                <span toggle="#password" class="input-group-text field-icon toggle-password"><i class="fa fa-eye"></i></span>
                                            </div>
                                        </div>
                                        @error('password')
                                            <span class="text-danger" role="alert">  {{ $message }} </span>
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
                                <!-- <button type="submit" class="float-right btn btn-primary">Sign In</button> -->
                                <button type="submit" class="btn login-form__btn submit w-100">Sign In</button>
                            </form>
                        </div>
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
        $.validator.addMethod("pwcheck", function(value) {
            return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d#@$!%*?&]{8,}$/.test(value)
        });
        $("#setPasswordForm").validate({
            ignore: [],
            errorClass: "invalid-feedback animated fadeInDown",
            errorElement: "div",
            rules: {
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
                password: {
                    required: "Please enter password",
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
