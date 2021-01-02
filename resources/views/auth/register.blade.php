@extends('auth.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 p-0">
                <div class="card">
                    <h3 class="card-header Log-title bg-white">{{ __('Register') }}</h3>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" id="register_form">
                            @csrf

                            <div class="col-md-12 row">
                                <div class="col-md-6 form-group">
                                    <label for="name">Firstname <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Firstname" @if(isset($user))
                                        value="{{$user->firstname}}" @else value="{{old('firstname')}}" @endif
                                        class="form-control" id="firstname" name="firstname" />
                                    @error('firstname')
                                    <label id="name-error" class="text-danger" for="firstname"> {{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="name">lastname <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Lastname" @if(isset($user))
                                        value="{{$user->lastname}}" @else value="{{old('lastname')}}" @endif
                                        class="form-control" id="lastname" name="lastname" />
                                    @error('lastname')
                                    <label id="name-error" class="text-danger" for="lastname"> {{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 row">
                                <div class="col-md-6 form-group">
                                    <input type="hidden" name="roles" id="roles" value="Nurse">
                                    <label for="name">Email <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Email" id="email" @if(isset($user))
                                        value="{{$user->email}}" @else value="{{old('email')}}" @endif class="form-control"
                                        name="email" />
                                    @error('email')
                                    <label id="name-error" class="text-danger" for="email"> {{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="name">Username <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Username" id="username" @if(isset($user))
                                        value="{{$user->username}}" @else value="{{old('username')}}" @endif
                                        class="form-control" name="username" />
                                    @error('username')
                                    <label id="name-error" class="text-danger" for="username"> {{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <!-- <div class="col-md-12 row">
                                <div class="col-md-6 form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                    @error('password')
                                        <label id="name-error" class="text-danger" for="dob"> {{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                                    @error('password_confirmation')
                                        <label id="name-error" class="text-danger" for="dob"> {{ $message }}</label>
                                    @enderror
                                </div>
                            </div> -->

                            <div class="col-md-12 row">
                                    <div class="form-group col-md-6">
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
                                    <div class="form-group col-md-6">
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

                            <div class="col-md-12 row">
                                <div class="col-md-12 form-group">
                                    <label for="name">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Phone Number" id="phone_number" @if(isset($user))
                                        value="{{$user->phone_number}}" @else value="{{old('phone_number')}}" @endif
                                        class="form-control phone-format" name="phone_number" />
                                    @error('phone_number')
                                        <label id="name-error" class="text-danger" for="phone_number"> {{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <!-- <div class="row justify-content-center my-3">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary submit_button">
                                        {{   (isset($user))?"Update":"Submit"  }}
                                    </button>
                                </div>
                            </div> -->
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary d-flex align-items-center btn-lg justify-content-center loginBtn">
                                        {{   (isset($user))?"Update":"Submit"  }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js-script')
    <script type="text/javascript">
        $(function() {
            var date = new Date();
            var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
            $('#dob').datepicker({
                dateFormat: 'dd-mm-yy',
                maxDate: today,
                changeMonth: true,
                changeYear: true,
                yearRange: "c-100:c+100",
                autoclose: true,
                todayHighlight: false
            });
            $.validator.addMethod("email", function(value) {
                return /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(value)
            });

            $.validator.addMethod("pwcheck", function(value) {
                return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d#@$!%*?&]{8,}$/.test(value)
            });

            $.validator.addMethod("valueNotEquals", function(value, element, arg){
                return arg !== value;
             }, "Value must not equal arg.");

            $.validator.addMethod("minAge", function(value, element, min) {
                var today = new Date();
                var birthDate = new Date(value);
                var age = today.getFullYear() - birthDate.getFullYear();

                if (age > min + 1) {
                  return true;
                }

                var m = today.getMonth() - birthDate.getMonth();

                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                  age--;
                }

                return age >= min;
            }, "You must be at least 18 years old!");

            $.validator.addMethod("customDateFormat", function(value) {
                if (value.substring(0, 2) > 12 || value.substring(0, 2) == "00") {
                  return false;
                }
                else if (value.substring(3, 5) > 31 || value.substring(0, 2) == "00") {
                  return false;
                }else {
                    return true;
                }
            }, "please enter valid date format");

            $("#register_form").validate({
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
                    password: {
                        required: true,
                        pwcheck: true,
                        minlength: 8
                    },
                    password_confirmation: {
                        required: true,
                        pwcheck: true,
                        minlength: 8,
                        equalTo: "#password"
                    },
                    /*dob: {
                        required: true,
                        minAge: 18,
                        customDateFormat: true
                    },*/
                    phone_number: "required",
                    "roles[]": "required"
                },
                messages: {
                    firstname: "Please enter firstname",
                    lastname: "Please enter lastname",
                    email: {
                        required: "Please enter email address",
                        email: "Please enter valid email",
                    },
                    username: {
                        required: "Please enter username",
                        minlength: "Your login name must consist of at least 4 characters"
                    },
                    password: {
                        required: "Please enter password",
                        pwcheck: "Password must contain atleast 1 uppercase, 1 lowercase, 1 digit and 1 special character, 8 characters long",
                        minlength: "Password must be at least 8 characters long"
                    },
                    password_confirmation: {
                        required: "Please enter confirm password",
                        pwcheck: "Confirm Password must contain atleast 1 uppercase, 1 lowercase, 1 digit and 1 special character, 8 characters long",
                        minlength: "Confirm Password must be at least 8 characters long",
                        equalTo: "Password And Confirm Password are not match"
                    },
                    /*dob: {
                        required: "Please enter date of birth"
                    },*/
                    phone_number: {
                        required: "Please enter phone number",
                    },
                    "roles[]": "Please select role"
                }
            });
            $('select').on('change', function() {
                $(this).valid();
            });
        });

            /***phone number format***/
            $(document).on('keypress',".phone-format",function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                  return false;
                }
                var curchr = this.value.length;
                var curval = $(this).val();
                if (curchr == 3 && e.which != 8 && e.which != 0) {
                    $(this).val(curval + "-");
                } else if (curchr == 7 && e.which != 8 && e.which != 0) {
                    $(this).val(curval + "-");
                }
                $(this).attr('maxlength', '12');
            });


    </script>
@endsection
