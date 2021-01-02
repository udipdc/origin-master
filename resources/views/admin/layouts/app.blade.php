@include('admin.layouts.header')
<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<!--*******************
    Preloader end
********************-->
    
<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">
    <!-- Navbar -->
    @include('admin.layouts.navbar')

    <!-- Main Sidebar Container -->
    @include('admin.layouts.sidebar')    

    @yield('content')

    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            @if(isset(settingData()->footer_text) && !empty(settingData()->footer_text))
                <p> {{ settingData()->footer_text }} </p>
            @else
                <p>Copyright &copy; Reserved by <a href="https://themeforest.net/user/quixlab">MedicalLogo</a> 2020</p>
            @endif

        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->
@include('admin.layouts.footer')
