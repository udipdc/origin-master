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
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <div class="text-center"> 
                                <a href="{{ route('admin.login') }}"><img src="{{asset('front/images/Logo/userImage.png')}}" class="rounded-circle userImage" alt=""></a>
                            </div>
                        
                            <form id="adminLoginForm" action="{{route('admin.login')}}" method="post" class="mt-5 mb-5">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                        <span class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                        <span class="input-group-append">
                                            <span toggle="#password" class="input-group-text toggle-password"><i class="fa fa-eye"></i></span>
                                        </span>
                                    </div>
                                </div>
                                <button class="btn login-form__btn submit w-100">Sign In</button>
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
        $("#adminLoginForm").validate({
            ignore:[],
            errorClass:"invalid-feedback animated fadeInDown",
            errorElement:"div",
            rules: {
                username: {
                    required: true,
                },
                password: {
                    required: true,
                    pwcheck:true,
                    minlength: 8
                }
            },
            messages: {
                username: {
                    required: "Please enter your username",
                },
                password: {
                    required: "Please enter your password",
                    pwcheck: "Password must contain atleast 1 uppercase, 1 lowercase, 1 digit and 1 special character, 8 characters long",
                    minlength: "Your password must be at least 8 characters long"
                }
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