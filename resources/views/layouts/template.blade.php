<!DOCTYPE html>
<html data-bs-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PT. Jambi Bara Sejahtera')</title>
    <link rel="stylesheet" href="{{ asset('ta/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="{{ asset('ta/assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ta/assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ta/assets/fonts/fontawesome5-overrides.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ta/assets/css/bs-theme-overrides.css') }}">
    <link rel="stylesheet" href="{{ asset('ta/assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark"
            style="position: relative;">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                    href="{{ url('home') }}">
                    <div class="sidebar-brand-icon"><img src="{{ asset('ta/assets/img/builder.png') }}" width="33"
                            height="34" style="height: 33px;"></div>
                    <div class="sidebar-brand-text mx-3"><span
                            style="font-size: 9px;color: var(--bs-navbar-active-color);">PT. Jambi Bara Sejahtera</span>
                    </div>
                </a>
                <ul class="nav nav-pills nav-fill text-light d-xxl-flex" id="accordionSidebar"
                    style="var(--bs-accordion-btn-focus-border-color);padding: 0;margin-top: 13px;">
                    <li class="nav-item">
                        <a class="nav-link {{ \Route::is('home') ? 'active' : '' }}" href="{{ url('home') }}">
                            <i class="fas fa-tachometer-alt text-center d-sm-inline-block me-md-3"
                                style="color: var(--bs-navbar-active-color);padding-right: 0;margin-right: 0;font-size: 15px;"></i>
                            <span style="color: var(--bs-navbar-active-color); margin:0;">Dashboard</span>
                        </a>
                    </li>
                    @can('admin')
                        <li class="nav-item">
                            <a class="nav-link {{ \Route::is('user.*') ? 'active' : '' }}" href="{{ url('user') }}">
                                <i class="fas fa-users-cog text-center d-sm-inline-block me-md-3"
                                    style="color: var(--bs-navbar-active-color);padding-right: 0;margin-right: 0;font-size: 15px;"></i>
                                <span style="color: var(--bs-navbar-active-color);margin-left: 2px;">Data User</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ \Route::is('dataalat.*') ? 'active' : '' }}"
                                href="{{ url('dataalat') }}">
                                <i class="fas fa-tractor text-center d-sm-inline-block me-md-3"
                                    style="color: var(--bs-navbar-active-color);padding-right: 0;margin-right: 0;font-size: 15px;"></i>
                                <span style="color: var(--bs-navbar-active-color);margin-left: 2px;">Data Alat Berat</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ \Route::is('datatruk.*') ? 'active' : '' }}"
                                href="{{ url('datatruk') }}">
                                <i class="fas fa-truck-moving text-center d-sm-inline-block me-md-3"
                                    style="color: var(--bs-navbar-active-color);padding-right: 0;margin-right: 0;font-size: 15px;"></i>
                                <span style="color: var(--bs-navbar-active-color);margin-left: 2px;">Data Truk
                                    Angkutan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ \Route::is('minyak.*') ? 'active' : '' }}"
                                href="{{ route('minyak.index') }}">
                                <i class="fas fa-tint text-center d-sm-inline-block me-md-3"
                                    style="color: var(--bs-navbar-active-color);padding-right: 0;margin-right: 0;font-size: 15px;"></i>
                                <span style="color: var(--bs-navbar-active-color);margin-left: 10px;">Kelola Minyak</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ \Route::is('batubara.*') ? 'active' : '' }}"
                                href="{{ route('batubara.index') }}">
                                <i class="fas fa-bahai text-center d-sm-inline-block me-md-3"
                                    style="color: var(--bs-navbar-active-color);padding-right: 0;margin-right: 0;font-size: 15px;"></i>
                                <span style="color: var(--bs-navbar-active-color);margin-left: 5px;">Kelola Batubara</span>
                            </a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link {{ \Route::is('laporan.*') ? 'active' : '' }}" href="{{ url('laporan') }}">
                            <i class="fas fa-clipboard text-center d-sm-inline-block me-md-3"
                                style="color: var(--bs-navbar-active-color);padding-right: 0;margin-right: 0;font-size: 15px;"></i>
                            <span style="color: var(--bs-navbar-active-color);margin-left: 9px;">Laporan</span>
                        </a>
                    </li>
                </ul>
                <hr class="sidebar-divider my-0">
                <div class="text-center d-none d-md-inline"></div>
            </div>
        </nav>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light"
                    style="background: #2b2c37;">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop"
                            type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown"
                                        href="#"><span
                                            class="d-none d-lg-inline me-2 text-gray-600 small">{{ Auth::user()->name }}</span></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <div class="dropdown-divider point"></div>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                <i
                                                    class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>{{ __('Logout') }}
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                {{-- content --}}
                @yield('content')
                @include('sweetalert::alert')
                {{-- end content --}}
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © PT. Jambi Bara Sejahtera 2023</span>
                    </div>
                </div>
            </footer>
        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

    <script src="{{ asset('ta/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ta/assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('ta/assets/js/bs-init.js') }}"></script>
    <script src="{{ asset('ta/assets/js/theme.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm-' + id).submit();
                }
            })
        }

        function confirmEdit() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to save the changes?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('editConfirm').submit();
                }
            })
        }

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#selectDataAlat").prop("disabled", true);
            $('input[type="radio"]').change(function() {
                if ($(this).attr("id") == "flexRadioDefault1") {
                    $("#selectDataAlat").prop("disabled", false);
                    $("#selectJenisUnit").prop("disabled", true);
                }
                if ($(this).attr("id") == "flexRadioDefault2") {
                    $("#selectDataAlat").prop("disabled", true);
                    $("#selectJenisUnit").prop("disabled", false);
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({});
        });
    </script>
</body>

</html>
