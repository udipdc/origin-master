@extends('auth.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <h4 class="card-header Log-title bg-white">{{ __('Login') }}</h4>

                <form method="POST" action="{{ route('login') }}" id="login_form">
                    @csrf
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">{{ __('Username') }}</label>
                                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert" id="username-error" for="username" style="margin-left: 36% !important;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                        <div class="input-group-prepend">
                                            <span toggle="#password" class="input-group-text field-icon toggle-password"><i class="fa fa-eye"></i></span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="text-danger" role="alert">  {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>                            
                            </div>
                            <div class="col-md-6 text-right">
                                @if (Route::has('password.request'))
                                    <a class="p-0 txt-primary-orange" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                            <!-- <div class="col-auto mt-3">
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary login-btn">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div> -->
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary d-flex align-items-center btn-lg justify-content-center login-btn loginBtn">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-js-script')
     <script type="text/javascript">
        $(function() {
            $.validator.addMethod("pwcheck", function(value) {
                return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d#@$!%*?&]{8,}$/.test(value)
            });

            $.validator.addMethod("email", function(value) {
                return /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(value)
            });

            $("#login_form").validate({
                ignore: [],
                errorClass: "invalid-feedback animated fadeInDown",
                errorElement: "div",
                errorPlacement: function(e, a) {
                    $(a).parents(".form-group").append(e)
                },
                highlight: function(e,errorClass, validClass) {
                    
                    var elem = $(e);
                    if(elem.hasClass('s-select2')) {
                        var isMulti = (!!elem.attr('multiple')) ? 's' : '';
                        elem.siblings('.sl').find('.select2-choice'+isMulti+'').addClass(errorClass);            
                    } 

                },
                unhighlight: function (element, errorClass, validClass) {
                    var elem = $(element);
                    
                    if(elem.hasClass('sl')) {
                        elem.siblings('.sl').find('.select2-choice').removeClass(errorClass);
                    } 
                },
                success: function(e) {
                    $(e).closest(".form-group").removeClass("is-invalid"), $(e).remove()
                },
                rules: {
                    username: {
                        required: true,
                        //minlength: 4
                        //email: true,
                    },
                    password: {
                        required: true,
                        minlength: 8
                        //pwcheck: true,
                    },
                },
                messages: {
                    username: {
                        required: "Please enter username",
                        //minlength: "Your login name must consist of at least 4 characters"
                        //email: "Please enter valid email",
                    },
                    password: {
                        required: "Please enter password",
                        minlength: "Password must be at least 8 characters long"
                        //pwcheck: "Password must contain atleast 1 uppercase, 1 lowercase, 1 digit and 1 special character, 8 characters long",
                    },
                }
            });
            $('select').on('change', function() {
                $(this).valid();
            });
        });
</script>
@endsection

