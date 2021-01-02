@extends('admin.layouts.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="user_form" name="user_form"
                            action="@if(!isset($user)) {{route('user.store')}} @else {{route('user.update',$user->id)}} @endif"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @isset($user)
                            {{ method_field('PATCH')}}
                            @endisset
                            <div class="form-group">
                                <label for="name">Firstname <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter Firstname" @if(isset($user))
                                    value="{{$user->firstname}}" @else value="{{old('firstname')}}" @endif
                                    class="form-control" id="firstname" name="firstname" />
                                @error('firstname')
                                <label id="name-error" class="text-danger" for="firstname"> {{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">lastname <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter Lastname" @if(isset($user))
                                    value="{{$user->lastname}}" @else value="{{old('lastname')}}" @endif
                                    class="form-control" id="lastname" name="lastname" />
                                @error('lastname')
                                <label id="name-error" class="text-danger" for="lastname"> {{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Email <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter Email" id="email" @if(isset($user))
                                    value="{{$user->email}}" @else value="{{old('email')}}" @endif class="form-control"
                                    name="email" />
                                @error('email')
                                <label id="name-error" class="text-danger" for="email"> {{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Username <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter Username" id="username" @if(isset($user))
                                    value="{{$user->username}}" @else value="{{old('username')}}" @endif
                                    class="form-control" name="username" />
                                @error('username')
                                <label id="name-error" class="text-danger" for="username"> {{ $message }}</label>
                                @enderror
                            </div>

                            <!-- @if(!isset($user))
                            <div class="form-group">
                                <label for="name">Password <span class="text-danger">*</span></label>
                                <input type="password" placeholder="Enter Password" id="password"
                                    value="{{old('password')}}" class="form-control" name="password" />
                                @error('password')
                                <label id="name-error" class="text-danger" for="password"> {{ $message }}</label>
                                @enderror
                            </div>
                            @endif -->

                            <div class="form-group">
                                <label for="name">DOB</label>
                                <input type="text" class="form-control" id="dob" name="dob"
                                    placeholder="Enter Date Of birth" @if(isset($user) && !empty($user->dob))
                                value="{{date('d-m-Y',strtotime($user->dob))}}" @else value="{{old('dob')}}" @endif>
                                @error('dob')
                                <label id="name-error" class="text-danger" for="dob"> {{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="" for="val-skill">Profile </label>
                                <div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="profile" name="profile">
                                        <label class="custom-file-label" for="customFile">Choose profile Image</label>
                                    </div>
                                    <input type="hidden" name="old_img" id="old_img" @if(isset($user))
                                        value="{{$user->profile}}" @endif>
                                    @if(isset($user) && $user->profile != '' && $user->profile != null)
                                    <span class="pip">
                                        <img src="{{url('images/users/'.$user->profile)}}" class="preview-img"
                                            alt="User Image" /><br>
                                        <span class="remove">Remove image</span></span>
                                    </span>
                                    @endif
                                    @error('profile')
                                    <label id="profile-error" class="text-danger" for="profile"> {{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Role <span class="text-danger">*</span></label>
                                <select multiple="multiple" class="form-control sl" name="roles[]" id="roles">
                                <option disabled value="-select-">-Select Role- </option>
                                    @foreach($roles as $role)
                                    <option
                                    @if(isset($user))  
                                        @if(App\User::find($user->id)->hasRole($role->name))
                                            selected
                                        @endif
                                    @endif  value="{{$role->id}}"> {{$role->name}} </option>
                                    @endforeach
                                </select>
                                @error('role')
                                <label id="role-error" class="text-danger" for="role"> {{ $message }}</label>
                                @enderror
                            </div>

                            <button type="submit"
                                class="btn btn-primary">{{   (isset($user))?"Update":"Submit"  }}</button>
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
    $('select').select2();
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

    $.validator.addMethod("pwcheck", function(value) {
        return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d#@$!%*?&]{8,}$/.test(value)
    });

    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg !== value;
     }, "Value must not equal arg.");

    $("#user_form").validate({
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
            /*password: {
                required: true,
                pwcheck: true,
                minlength: 8
            },*/
            profile: {
                extension: "jpg|jpeg|png|JPG|JPEG|PNG",
            },
            "roles[]": "required"
            
            
            
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
            /*password: {
                required: "Please enter password",
                pwcheck: "Password must contain atleast 1 uppercase, 1 lowercase, 1 digit and 1 special character, 8 characters long",
                minlength: "Password must be at least 8 characters long"
            },*/
            profile: {
                extension: "Please select image format.(eg: jpg|jpeg|png|JPG|JPEG|PNG)",
            },
            "roles[]": "Please select role"
            
        }
    });
    $('select').on('change', function() {
        $(this).valid();
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
                        "<img class=\"preview-img\" src=\"" + e.target.result +
                        "\" title=\"" + file.name + "\"/>" +
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
$(document).on('click', '.remove', function() {
    $(".pip").remove();
    $('#profile').val('');
    $('#old_img').val('');
});
</script>
@endsection