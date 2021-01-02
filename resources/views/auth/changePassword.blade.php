@extends('auth.layouts.app')

@section('content')
<style type="text/css">
    a:hover {
        color: #e79d54 !important;
    }

    a.nav-link.active{
        border-left: 3px solid #e79d54 !important;
        border-bottom: none !important;
        padding-left: 10% !important;
    }

    .nav-tabs .nav-link.active:hover{
        border-bottom: none !important;
    }
    .nav-tabs .nav-link.active{
        border-bottom: none !important;
    }
</style>
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-auto">
          <h2 class="m-0">Settings</h2>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3 mb-3">
            <a class="sidebar-title p-2 d-md-none d-flex justify-content-between" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3" id="preferencesText">
                Settings
                <i class="fas fa-chevron-down"></i>
            </a>
            <div class="collapse sidemenu" id="collapseExample3">
                <ul class="nav nav-tabs nav-pills flex-column" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-item nav-link" id="nav-editProfile-tab" href="{{ route('nurse.edit') }}">Edit User Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" id="nav-changePassword-tab" href="{{ route('nurse.changePassword') }}">Change Password</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <section class="tabs-menu m-my-30">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="nav-editProfile" role="tabpanel">
                    </div>
                    <div class="tab-pane fade" id="nav-changePassword" role="tabpanel">
                        <div class="container bg-white p-p-30">
                            <form method="POST" action="{{route('nurse.updatePassword')}}" id="chnagePasswordForm">
                                @csrf
                                <input type="hidden" name="tab" value="nav-changePassword">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Current Password <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter your current password" value="{{old('old_password')}}">
                                                <div class="input-group-prepend">
                                                    <span toggle="#old_password" class="input-group-text field-icon old_toggle_password"><i class="fa fa-eye"></i></span>
                                                </div>
                                            </div>
                                            @error('old_password')
                                                <span class="text-danger" role="alert">  {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>New Password <span class="text-danger">*</span></label>
                                            <div class="input-group"> 
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your new password" value="{{old('password')}}">
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
                                </div>

                                <div class="row justify-content-center">
                                  <div class="col-auto">
                                    <a href="{{ url('/') }}" class="btn btn-primary cancel_button d-flex align-items-center btn-lg justify-content-center" style="background-color: transparent!important;color: #e79d54;">
                                      Cancel
                                    </a>
                                  </div>
                                  <div class="col-auto">
                                    <button type="submit" class="btn btn-primary submit_button step6-submit btn-lg">
                                      {{   (isset($user))?"Update":"Submit"  }}
                                    </button>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <section>
        </div>
    </div>
</div>

@endsection

@section('page-js-script')

    <script type="text/javascript">
        /*start changePassword.*/
            $(document).on('click', '.old_toggle_password', function() {
                $(this).find('i').toggleClass('fa-eye fa-eye-slash');
                    let input = $($(this).attr('toggle'));
                if (input.attr('type') == 'password') {
                    input.attr('type', 'text');
                }
                else {
                    input.attr('type', 'password');
                }
            });
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
        /*end changePassword.*/

        //redirect to specific tab
        $(document).ready(function () {
            $('#nav-changePassword-tab').addClass('active');
            $('#nav-changePassword').addClass('active show');
            $('a#preferencesText').html('Change Password <i class="fas fa-chevron-down"></i>');
        });

        /*start active tab setting text changes.*/
          $('.nav-tabs a').on('shown.bs.tab', function(event){
              var tabText = $(event.target).text();         // active tab
              //alert(tabText);
              //$('.preferencesText').text(tabText);

              $('a#preferencesText').html(''+tabText+'<i class="fas fa-chevron-down"></i>');
          });
        /*end active tab setting text changes.*/
    </script>

@endsection

