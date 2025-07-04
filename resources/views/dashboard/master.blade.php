<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>@yield("title") - {{ config('app.sitesettings')::first()->site_title }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset("apple-touch-icon.png") }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset("dc_logo_750_750.png") }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("favicon.ico") }}">
    <link rel="manifest" href="{{ asset("site.webmanifest") }}">
    <link rel="mask-icon" href="{{ asset("safari-pinned-tab.svg") }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="keywords" content="Artificial Intelligence, AI, Innovative, 2025, IT, Tech, Blogs, news, tutorials, software development, IT infrastructure, technical communication, startup, co-founders, developers, learning, education, coding, programming, web development, web design, Duck Cloud">
    <meta name="description" content="At Duck Cloud, we're passionate about making tech knowledge accessible for everyone—from solo developers and startup teams to co-founders and lifelong learners. Our platform is built to empower you with practical tutorials, clear documentation, and reliable references in all areas of software development, IT infrastructure, and technical communication.  Whether you’re just starting out or scaling a product, Duck Cloud is your go-to resource to learn, build, and grow with confidence. We simplify complex topics, support real-world use cases, and keep pace with the rapidly evolving tech landscape.">
    <meta property="og:title" content="Duck Cloud - Learning Platform for IT, Tech, and Software Development">
    <meta property="og:description" content="At Duck Cloud, we're passionate about making tech knowledge accessible for everyone—from solo developers and startup teams to co-founders and lifelong learners. Our platform is built to empower you with practical tutorials, clear documentation, and reliable references in all areas of software development, IT infrastructure, and technical communication.  Whether you’re just starting out or scaling a product, Duck Cloud is your go-to resource to learn, build, and grow with confidence. We simplify complex topics, support real-world use cases, and keep pace with the rapidly evolving tech landscape.">
    <meta property="og:image" content="{{ asset("dc_logo_750_750.png") }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"/>
    <link rel="stylesheet" href="{{ asset("assets/dashboard/plugins/fontawesome-free/css/all.min.css") }}"/>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
    <link rel="stylesheet" href="{{ asset("assets/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/dashboard/plugins/jqvmap/jqvmap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/dashboard/dist/css/adminlte.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/dashboard/plugins/daterangepicker/daterangepicker.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/dashboard/plugins/summernote/summernote-bs4.min.css") }}"/>
    @yield("style")
</head>
<body class="hold-transition sidebar-mini layout-fixed"> <!-- sidebar-collapse -->
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <span class="fa-2x brand-text font-weight-bold px-2">{{ config('app.sitesettings')::first()->site_title }}</span>
        </div>
        @include("dashboard.inc.navbar")
        @include("dashboard.inc.sidebar")
        @yield("content")
        @include("dashboard.inc.footer")
    </div>
    <script src="{{ asset("assets/dashboard/plugins/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("assets/dashboard/plugins/jquery-ui/jquery-ui.min.js") }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset("assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("assets/dashboard/plugins/chart.js/Chart.min.js") }}"></script>
    <script src="{{ asset("assets/dashboard/plugins/sparklines/sparkline.js") }}"></script>
    <script src="{{ asset("assets/dashboard/plugins/jqvmap/jquery.vmap.min.js") }}"></script>
    <script src="{{ asset("assets/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js") }}"></script>
    <script src="{{ asset("assets/dashboard/plugins/jquery-knob/jquery.knob.min.js") }}"></script>
    <script src="{{ asset("assets/dashboard/plugins/moment/moment.min.js") }}"></script>
    <script src="{{ asset("assets/dashboard/plugins/daterangepicker/daterangepicker.js") }}"></script>
    <script src="{{ asset("assets/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}"></script>
    <script src="{{ asset("assets/dashboard/plugins/summernote/summernote-bs4.min.js") }}"></script>
    <script src="{{ asset("assets/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}"></script>
    <script src="{{ asset("assets/dashboard/dist/js/adminlte.js") }}"></script>
    @yield("script")
</body>
</html>
