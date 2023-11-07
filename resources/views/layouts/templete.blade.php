<!DOCTYPE html>
<html data-bs-theme="light" lang="en" style="/* --bs-primary: #FC00FF;*//*--bs-primary-rgb: 252,0,255;*/">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="{{ asset('ta/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="{{ asset('ta/assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ta/assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ta/assets/fonts/fontawesome5-overrides.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ta/assets/css/bs-theme-overrides.css') }}">
</head>


<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark"
            style="position: relative;background: linear-gradient(60deg, #00DBDE 0%, #FC00FF 100%), #00DBDE;">
            <div class="container-fluid d-flex flex-column p-0"><a
                    class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                    href="{{url('home')}}">
                    <div class="sidebar-brand-icon"><img src="{{ asset('ta/assets/img/builder.png') }}" width="33"
                            height="34" style="height: 33px;"></div>
                    <div class="sidebar-brand-text mx-3"><span
                            style="font-size: 9px;color: var(--bs-navbar-active-color);">PT. jambi bara sejahtera</span>
                    </div>
                </a>
                <ul class="navbar-nav text-light d-xxl-flex" id="accordionSidebar"
                    style="color: var(--bs-accordion-btn-focus-border-color);padding-bottom: 0px;padding-top: 0px;margin-top: 13px;">
                    <li class="nav-item"><a class="nav-link" href="{{url('home')}}"><i
                                class="fas fa-tachometer-alt text-center d-sm-inline-block me-md-3"
                                style="color: var(--bs-navbar-active-color);padding-right: 0px;margin-right: 0px;font-size: 15px;"></i><span
                                style="color: var(--bs-navbar-active-color);">Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('dataalat')}}"><i
                                class="fas fa-table text-center d-sm-inline-block me-md-3"
                                style="color: var(--bs-navbar-active-color);padding-right: 0;margin-right: 0px;font-size: 15px;"></i><span
                                style="color: var(--bs-navbar-active-color);margin-left: 0px;">Data Alat
                                berat</span></a><a class="nav-link" href="{{url('datatruk')}}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-folder-fill text-center d-sm-inline-block me-md-3"
                                style="color: var(--bs-navbar-active-color);padding-right: 0;margin-right: 0px;font-size: 15px;">
                                <path
                                    d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z">
                                </path>
                            </svg><span style="color: var(--bs-navbar-active-color);margin-left: 0px;">Data Truk
                                Angkutan</span></a><a class="nav-link" href="{{url('alat')}}"><svg
                                xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="1em"
                                viewBox="0 0 24 24" width="1em" fill="currentColor"
                                class="text-center d-sm-inline-block me-md-3"
                                style="color: var(--bs-navbar-active-color);padding-right: 0;margin-right: 0px;font-size: 15px;">
                                <g>
                                    <rect fill="none" height="24" width="24"></rect>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M19.5,12c0.93,0,1.78,0.28,2.5,0.76V8c0-1.1-0.9-2-2-2h-6.29l-1.06-1.06l1.41-1.41l-0.71-0.71L9.82,6.35l0.71,0.71 l1.41-1.41L13,6.71V9c0,1.1-0.9,2-2,2h-0.54c0.95,1.06,1.54,2.46,1.54,4c0,0.34-0.04,0.67-0.09,1h3.14 C15.3,13.75,17.19,12,19.5,12z">
                                        </path>
                                        <path
                                            d="M19.5,13c-1.93,0-3.5,1.57-3.5,3.5s1.57,3.5,3.5,3.5s3.5-1.57,3.5-3.5S21.43,13,19.5,13z M19.5,18 c-0.83,0-1.5-0.67-1.5-1.5s0.67-1.5,1.5-1.5s1.5,0.67,1.5,1.5S20.33,18,19.5,18z">
                                        </path>
                                        <path d="M4,9h5c0-1.1-0.9-2-2-2H4C3.45,7,3,7.45,3,8C3,8.55,3.45,9,4,9z"></path>
                                        <path
                                            d="M9.83,13.82l-0.18-0.47L10.58,13c-0.46-1.06-1.28-1.91-2.31-2.43l-0.4,0.89l-0.46-0.21l0.4-0.9C7.26,10.13,6.64,10,6,10 c-0.53,0-1.04,0.11-1.52,0.26l0.34,0.91l-0.47,0.18L4,10.42c-1.06,0.46-1.91,1.28-2.43,2.31l0.89,0.4l-0.21,0.46l-0.9-0.4 C1.13,13.74,1,14.36,1,15c0,0.53,0.11,1.04,0.26,1.52l0.91-0.34l0.18,0.47L1.42,17c0.46,1.06,1.28,1.91,2.31,2.43l0.4-0.89 l0.46,0.21l-0.4,0.9C4.74,19.87,5.36,20,6,20c0.53,0,1.04-0.11,1.52-0.26l-0.34-0.91l0.47-0.18L8,19.58 c1.06-0.46,1.91-1.28,2.43-2.31l-0.89-0.4l0.21-0.46l0.9,0.4C10.87,16.26,11,15.64,11,15c0-0.53-0.11-1.04-0.26-1.52L9.83,13.82z M7.15,17.77c-1.53,0.63-3.29-0.09-3.92-1.62c-0.63-1.53,0.09-3.29,1.62-3.92c1.53-0.63,3.29,0.09,3.92,1.62 C9.41,15.38,8.68,17.14,7.15,17.77z">
                                        </path>
                                    </g>
                                </g>
                            </svg><span style="color: var(--bs-navbar-active-color);margin-left: 0px;">Kinerja Alat
                                Berat</span></a><a class="nav-link" href="{{url('truk')}}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20"
                                fill="none" class="text-center d-sm-inline-block me-md-3"
                                style="color: var(--bs-navbar-active-color);padding-right: 0;margin-right: 0px;font-size: 15px;">
                                <path
                                    d="M8 16.5C8 17.3284 7.32843 18 6.5 18C5.67157 18 5 17.3284 5 16.5C5 15.6716 5.67157 15 6.5 15C7.32843 15 8 15.6716 8 16.5Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M15 16.5C15 17.3284 14.3284 18 13.5 18C12.6716 18 12 17.3284 12 16.5C12 15.6716 12.6716 15 13.5 15C14.3284 15 15 15.6716 15 16.5Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M3 4C2.44772 4 2 4.44772 2 5V15C2 15.5523 2.44772 16 3 16H4.05001C4.28164 14.8589 5.29052 14 6.5 14C7.70948 14 8.71836 14.8589 8.94999 16H10C10.5523 16 11 15.5523 11 15V5C11 4.44772 10.5523 4 10 4H3Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M14 7C13.4477 7 13 7.44772 13 8V14.05C13.1616 14.0172 13.3288 14 13.5 14C14.7095 14 15.7184 14.8589 15.95 16H17C17.5523 16 18 15.5523 18 15V10C18 9.73478 17.8946 9.48043 17.7071 9.29289L15.7071 7.29289C15.5196 7.10536 15.2652 7 15 7H14Z"
                                    fill="currentColor"></path>
                            </svg><span style="color: var(--bs-navbar-active-color);margin-left: 0px;">Kinerja Truk
                                Angkutan</span></a><a class="nav-link" href="{{url('laporan')}}"><i
                                class="fa fa-sticky-note text-center d-sm-inline-block me-md-3"
                                style="color: var(--bs-navbar-active-color);padding-right: 0;margin-right: 0px;font-size: 15px;"></i><span
                                style="color: var(--bs-navbar-active-color);margin-left: 0px;">Laporan</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <hr class="sidebar-divider my-0">
                <div class="text-center d-none d-md-inline"></div>
            </div>
        </nav>


        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light"
                    style="background: #2b2c37;">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3"
                            id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                            class="d-none d-lg-inline me-2 text-gray-600 small">Abid
                                            Ibadurrahman</span><img class="border rounded-circle img-profile"
                                            src="{{ asset('ta/assets/img/avatars/avatar3.jpeg') }}"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a
                                            class="dropdown-item" href="{{url('profile')}}"><i
                                                class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <div class="dropdown-divider point"></div><a class="dropdown-item"
                                                href="{{route('logout')}}"
                                                onclick="event.preventDefault();
                                            this.closest('form').submit();"><i
                                                    class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>{{ __('Logout') }}</a>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                {{-- content --}}
                @yield('content')
                {{-- end content --}}
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © PT. Jambi Bara Sejahtera 2023</span>
                    </div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>


    <script src="{{ asset('ta/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ta/assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('ta/assets/js/bs-init.js') }}"></script>
    <script src="{{ asset('ta/assets/js/theme.js') }}"></script>
</body>

</html>
