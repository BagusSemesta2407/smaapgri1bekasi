<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>SMA PGRI 1 BEKASI</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/izitoast/dist/css/iziToast.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/dist/sweetalert2.min.css') }}"> --}}

    {{-- select2 --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Dropify -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropify/dist/css/dropify.min.css') }}">
    {{-- gijgo datepicker --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/gijgo/css/gijgo.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                </form>

                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            {{-- <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="{{ url('/') }}" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Landing Page
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a> --}}
                            {{-- <div class="dropdown-divider"></div> --}}
                            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            @include('layouts.backend.side')

            @yield('content')

            {{-- <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer> --}}
        </div>
    </div>

    <!-- General JS Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('assets/plugins/jquery/jquery-3.3.1.min.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/plugins/izitoast/dist/js/iziToast.min.js') }}"></script>
    <!-- JS Libraies -->

    {{-- sweet alert --}}
    <script src="{{ asset('assets/plugins/sweetalert/dist/sweetalert.min.js') }}"></script>

    {{-- gijgo datepicker --}}
    <script src="{{ asset('assets/plugins/gijgo/js/gijgo.min.js') }}" type="text/javascript"></script>
    {{-- dropify --}}
    <script src="{{ asset('assets/plugins/dropify/dist/js/dropify.min.js') }}"></script>
    {{-- summernote --}}
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    {{-- select2 --}}
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    {{-- repeter --}}
    {{-- <script src="{{ asset('assets/plugins/repeater/jquery.repeater.min.js') }}" type="text/javascript"></script> --}}

    <!-- JS Libraies -->
    <script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/plugins/currency/simple.money.format.js') }}"></script> --}}
    <!-- Template JS File -->

    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>


    {{-- Block UI --}}
    <script src="{{ asset('assets/plugins/block-ui/block-ui.js') }}"></script>
    {{-- Block UI --}}

    {{-- Laravel Share Button --}}
    {{-- <script src="{{ asset('js/share.js') }}"></script> --}}
    {{-- Laravel Share Button --}}

    {{-- sweet alert --}}
    <script src="{{ asset('assets/plugins/sweetalert2/dist/sweetalert2.all.min.js') }}" type="text/javascript"></script>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  

    <script>
        $(document).ready(function() {
            @if (session('success'))
                iziToast.success({
                    message: "{{ session('success') }}",
                    position: 'topRight'
                });
            @endif ()

            @if (session('error'))
                iziToast.error({
                    message: "{{ session('error') }}",
                    position: 'topRight'
                });
            @endif ()

            $('.dropify').dropify();

            $(".select2").select2();

            $('#datepicker').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy-mm-dd'
            });
        });
    </script>

    @yield('script')


</body>

</html>
