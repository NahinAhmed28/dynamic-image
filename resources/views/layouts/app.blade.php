<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo11/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Feb 2022 19:59:16 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> Dashboard </title>
    <link rel="icon" type="image/x-icon" href="{!! asset('font') !!}/assets/img/favicon.ico"/>
    <link href="{!! asset('font') !!}/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="{!! asset('font') !!}/assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{!! asset('font') !!}/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="{!! asset('font') !!}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{!! asset('font') !!}/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="{!! asset('font') !!}/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{!! asset('font') !!}/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="{!! asset('font') !!}/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="{!! asset('font') !!}/assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{!! asset('font') !!}/plugins/select2/select2.min.css">
    <link href="{!! asset('font') !!}/assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />
    <link href="{!! asset('font') !!}/assets/css/components/timeline/custom-timeline.css" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/tree.css') !!}" rel="stylesheet" type="text/css" />

    <style class="dark-theme">
        #chart-2 path {
            stroke: #0e1726;
        }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<body class="alt-menu sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
       <div class="loader">
         <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
        </div>
      </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container" style="background: #06644f">
        <header class="header navbar navbar-expand-sm">



            @include('components.navbar')

            <ul class="navbar-item flex-row ml-auto">

            </ul>

            <ul class="navbar-item flex-row nav-dropdowns">
                <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <img src="{!! asset('font') !!}/assets/img/profile-7.jpg" class="img-fluid" alt="admin-profile">
                        </div>
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                                <div class="media-body">
                                    <h5>{{ Auth::user()->name }}</h5>
                                    <p>Project Leader</p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-item">
                            <a href="{!! route('logout') !!}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Log Out</span>
                            </a>
                        </div>
                    </div>

                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="page-header">
                    <div class="page-title">

                        <h3> @yield('section_title') </h3>
                    </div>


                </div>

               @yield('content')
            </div>
            <div class="footer-wrapper">
              <div class="footer-section f-section-1">
                <p class="">Copyright © {{ Carbon\Carbon::now()->year; }} <a target="_blank" href="{!! route('dashboard') !!}">{{ env('APP_NAME') }}</a>, All rights reserved.</p>
              </div>
              <div class="footer-section f-section-2">
                <p class="">Developed By <a href="https://sifztech.com/" target="_blank">SIFZTECH</a> </p>
              </div>
            </div>
        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{!! asset('font') !!}/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="{!! asset('font') !!}/bootstrap/js/popper.min.js"></script>
    <script src="{!! asset('font') !!}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{!! asset('font') !!}/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{!! asset('font') !!}/assets/js/app.js"></script>
    <script src="{!! asset('font') !!}/plugins/select2/select2.min.js"></script>
    <script src="{!! asset('font') !!}/plugins/select2/custom-select2.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
        $(".tagging").select2({
            tags: true
        });
    </script>
    <script src="{!! asset('font') !!}/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{!! asset('font') !!}/plugins/apex/apexcharts.min.js"></script>
    <script src="{!! asset('font') !!}/assets/js/dashboard/dash_1.js"></script>
    <script src="{!! asset('font') !!}/assets/js/custom.js"></script>
    <script src="{!! asset('font') !!}/assets/js/components/ui-accordions.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    @stack('scripts')

</body>

<!-- Mirrored from designreset.com/cork/ltr/demo11/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Feb 2022 20:00:05 GMT -->
</html>
