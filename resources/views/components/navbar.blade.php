<a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

<div class="nav-logo align-self-center" style="">
    <a class="navbar-brand" href="{!! route('dashboard') !!}"><img alt="logo" src="{!! asset('font') !!}/assets/img/logo.png"></a>
</div>


<ul class="navbar-item topbar-navigation">

    <!--  BEGIN TOPBAR  -->
    <div class="topbar-nav header navbar" role="banner">
        <nav id="topbar">
            <ul class="navbar-nav theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="{!! route('dashboard') !!}">
                        <img src="{!! asset('font') !!}/assets/img/logo.png" class="navbar-logo" style="width: 95px; height: 70px;" alt="logo">
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled menu-categories" id="topAccordion">

                <li class="menu single-menu active">
                    <a href="#" class="dropdown-toggle autodroprown" data-toggle="modal" data-target="#zoomupModal">
                        <div class="">
                            <i class="fa-solid fa-plus"></i>
                            <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add Image</span>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!--  END TOPBAR  -->

</ul>
