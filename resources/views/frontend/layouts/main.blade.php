<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Website | Template hàng đầu</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/frontend/img/favicon.ico">
    <base href="{{ asset('') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- all css here -->
    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="/frontend/css/magnific-popup.css">
    <link rel="stylesheet" href="/frontend/css/animate.css">
    <link rel="stylesheet" href="/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/frontend/css/themify-icons.css">
    <link rel="stylesheet" href="/frontend/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="/frontend/css/icofont.css">
{{--    //use for du-an--}}
    <link rel="stylesheet" href="/frontend/css/jquery-ui.css">
    <link rel="stylesheet" href="/frontend/css/easyzoom.css">

    <link rel="stylesheet" href="/frontend/css/meanmenu.min.css">
    <link rel="stylesheet" href="/frontend/css/bundle.css">
    <link rel="stylesheet" href="/frontend/css/style.css">
    <link rel="stylesheet" href="/frontend/css/responsive.css">
    <link rel="stylesheet" href="/frontend/css/myCustom.css">
    <link rel="stylesheet" href="/frontend/css/myResponsive.css">


    <script src="/frontend/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>

    @include('frontend.layouts.header')

    @yield('content')

    @extends('frontend.layouts.footer')
<!-- all js here -->

    <!-- all js here -->
    <script src="/frontend/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="/frontend/js/popper.js"></script>
    <script src="/frontend/js/bootstrap.min.js"></script>
    <script src="/frontend/js/jquery.magnific-popup.min.js"></script>
    <script src="/frontend/js/isotope.pkgd.min.js"></script>
    <script src="/frontend/js/imagesloaded.pkgd.min.js"></script>
    <script src="/frontend/js/jquery.counterup.min.js"></script>
    <script src="/frontend/js/waypoints.min.js"></script>

    <script src="/frontend/js/ajax-mail.js"></script>
    <script src="/frontend/js/owl.carousel.min.js"></script>
    <script src="/frontend/js/plugins.js"></script>
    <script src="/frontend/js/main.js"></script>
{{--    product hover--}}
    <script>
        $(document).ready(function() {

            $('.card').delay(1800).queue(function(next) {
                $(this).removeClass('hover');
                $('a.hover').removeClass('hover');
                next();
            });
        });
    </script>
    @yield('script')

</body>
</html>

