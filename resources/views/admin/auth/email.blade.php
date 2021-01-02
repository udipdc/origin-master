@extends('admin.auth.layouts.app')

@section('content')
<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    @if (session()->has('error'))
                        <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </p>
                    @endif
                    @if (session()->has('message'))
                        <p class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </p>
                    @endif
                    @if (session()->has('status'))
                        <p class="alert alert-success alert-dismissible fade show" role="alert">{{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </p>
                    @endif
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <div class="text-center"> 
                                @if(isset(settingData()->site_logo) && !empty(settingData()->site_logo))
                                    <a href="{{ route('admin.login') }}"><img src="{{asset('front/images/Logo/'.settingData()->site_logo)}}" alt="brand-logo"></a>
                                @else
                                    <a href="{{ route('admin.login') }}"><img src="{{asset('front/images/Logo/MedicalLogo.jpg')}}" alt=""></a>
                                @endif
                            </div>
                            <form method="POST" id="adminForgPassForm" action="{{ route('password.email') }}" class="mt-5 mb-5">
                                @csrf

                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email Address">
                                        <span class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                        </span>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button class="btn login-form__btn submit w-100">{{ __('Send Password Reset Link') }}</button>
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
        $.validator.addMethod("email", function(value) {
            return /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(value)
        });
        $("#adminForgPassForm").validate({
            ignore:[],
            errorClass:"invalid-feedback animated fadeInDown",
            errorElement:"div",
            rules: {
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                email: {
                    required: "Please enter your email address",
                    email: "Please enter valid email address",
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
    });
</script>
@endsection
