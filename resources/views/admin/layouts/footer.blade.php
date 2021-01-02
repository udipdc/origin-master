
    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('plugins/common/common.min.js')}}"></script>
    <script src="{{asset('admin/js/custom.min.js')}}"></script>
    <script src="{{asset('admin/js/settings.js')}}"></script>
    <script src="{{asset('admin/js/gleek.js')}}"></script>
    <script src="{{asset('admin/js/styleSwitcher.js')}}"></script>

    <script src="{{asset('plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/js/additional-methods.min.js')}}"></script>
    <script src="{{asset('plugins/toastr/js/toastr.min.js')}}"></script>


    <!--  flot-chart js -->
    <script src="{{asset('plugins/flot/js/jquery.flot.min.js')}}"></script>
    <script src="{{asset('plugins/flot/js/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('plugins/flot/js/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('plugins/flot/js/jquery.flot.spline.js')}}"></script>

    <!-- Chartjs -->
    <script src="{{asset('plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Circle progress -->
    <script src="{{asset('plugins/circle-progress/circle-progress.min.js')}}"></script>
    <!-- Datamap -->
    <script src="{{asset('plugins/d3v3/index.js')}}"></script>
    <script src="{{asset('plugins/topojson/topojson.min.js')}}"></script>
    <script src="{{asset('plugins/datamaps/datamaps.world.min.js')}}"></script>
    <!-- Morrisjs -->
    <script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('plugins/morris/morris.min.js')}}"></script>
    <!-- Pignose Calender -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
    <!-- ChartistJS -->
    <script src="{{asset('plugins/chartist/js/chartist.min.js')}}"></script>
    <script src="{{asset('plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

    <script src="{{asset('plugins/sweetalert/js/sweetalert.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>

    <!-- <script src="{{asset('admin/js/dashboard/dashboard-1.js')}}"></script> -->
    <script type="text/javascript">@if($message = Session::get('success')) var success_msg = "{!! $message !!}"; @endif @if($message = Session::get('error')) var error_msg = "{!! $message !!}"; @endif</script>
    <script type="text/javascript">
        $(function () {
           /*print success msgs*/
            if(typeof success_msg !== 'undefined'){
                toastr.success(success_msg,{timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1})
            }
           /*print error msgs*/
            if(typeof error_msg !== 'undefined'){
                toastr.error(error_msg,{positionClass:"toast-top-right",timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
            }
        })
        $(document).on('click','.toggle-password', function() {
            $(this).find('i').toggleClass('fa-eye fa-eye-slash');
                let input = $($(this).attr('toggle'));
            if (input.attr('type') == 'password') {
                input.attr('type', 'text');
            }
            else {
                input.attr('type', 'password');
            }
        });

        
    </script>
    @yield('page-js-script')
</body>

</html>
