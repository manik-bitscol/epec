<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EPEC</title>
    <link rel="shortcut icon" href="{{ asset($favicon->value) }}" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/assets/backend') }}/plugins/fontawesome-free/css/all.min.css">

    <!-- Theme style -->
    @stack('css')
    <link rel="stylesheet" href="{{ asset('/assets/backend') }}/dist/css/adminlte.min.css">
</head>

<body class="sidebar-mini">
    <div class="wrapper">

        @includeIf('admin.partials.header')

        @includeIf('admin.partials.sidenav')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <div class="content">
                @yield('content')
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        @includeIf('admin.partials.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('/assets/backend') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/assets/backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/assets/backend') }}/dist/js/adminlte.min.js"></script>
    @stack('js')

</body>

</html>
