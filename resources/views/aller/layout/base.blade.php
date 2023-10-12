<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Aller</title>
        <!-- plugins:css -->
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        {{-- <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"> --}}
        <!-- iCheck -->
        {{-- <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"> --}}
        <!-- JQVMap -->
        {{-- <link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css"> --}}
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
        <!-- overlayScrollbars -->
        {{-- <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}"> --}}
        {{-- <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css"> --}}

        <link rel="stylesheet" href="{{ asset('assets/datatable/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
        @stack('internal-css')
    </head>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @yield('master')

    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>


    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}


    <!-- jQuery UI 1.11.4 -->
    {{-- <script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script> --}}
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Bootstrap 4 -->
    <!-- ChartJS -->
    {{-- <script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script> --}}
    <!-- Sparkline -->
    {{-- <script src="{{asset('assets/plugins/sparklines/sparkline.js')}}"></script> --}}
    <!-- JQVMap -->
    {{-- <script src="{{asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>s --}}
    {{-- <script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> --}}
    <!-- jQuery Knob Chart -->
    {{-- <script src="{{asset('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script> --}}
    <!-- daterangepicker -->
    {{-- <script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script> --}}
    <!-- Tempusdominus Bootstrap 4 -->
    {{-- <script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script> --}}
    <!-- Summernote -->
    {{-- <script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script> --}}
    <!-- overlayScrollbars -->
    {{-- <script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script> --}}
    <!-- AdminLTE App -->
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{asset('assets/dist/js/demo.js')}}"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="{{asset('assets/dist/js/pages/dashboard.js')}}"></script> --}}


    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script> --}}

    <script src="{{ asset('assets/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('assets/dist/js/adminlte.js')}}"></script>

    <script src="{{ asset('assets/js/databl/custom-dt.js' )}}"></script>


    @stack('internal-js')
</body>

</html>
