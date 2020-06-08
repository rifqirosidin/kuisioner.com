<!doctype html>
<html lang="en" class="no-focus">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>@yield('title', 'Online Tester') | Kuisioner.com</title>

    <meta name="description" content="Dengan Kuisioner.com anda akan mudah mendapatkan uang hanya bermodalkan gadger atau laptop dari rumah">
    <meta name="author" content="pixelcave">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Kuisioner.com">
    <meta property="og:site_name" content="Kuisioner.com">
    <meta property="og:description" content="Dengan Kuisioner.com anda akan mudah mendapatkan uang hanya bermodalkan gadger atau laptop dari rumah">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:image" content="kuisioner.com">

{{--    <!-- Icons -->--}}
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('images/logo/kuisioner.png') }}" size="200">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/logo/kuisioner.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/logo/kuisioner.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    @stack('css_before')

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
    <link rel="stylesheet" href="{{ asset('vendor/assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" id="css-main" href="{{ asset('vendor/assets/css/codebase.min.css') }}">

    @stack('css_after')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
</head>
<body>

@yield('content')

<script src="{{ asset('vendor/assets/js/codebase.core.min.js') }}"></script>
<script src="{{ asset('vendor/assets/js/codebase.app.min.js') }}"></script>
<script src="{{ asset('vendor/assets/js/pages/be_ui_icons.min.js') }}"></script>
{{--<script src="{{ asset('js/sweetalert.min.js') }}"></script>--}}

<!-- Page JS Plugins -->
<script src="{{ asset('vendor/assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('vendor/assets/js/plugins/es6-promise/es6-promise.auto.min.js') }}"></script>
<script src="{{ asset('vendor/assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('vendor/assets/js/pages/be_ui_activity.min.js') }}"></script>

<!-- Page JS Helpers (BS Notify Plugin) -->
@include('include.notify')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
{{--<script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>--}}
@stack('js')

<!-- Start of HubSpot Embed Code -->

<!-- End of HubSpot Embed Code -->
</body>

</html>
