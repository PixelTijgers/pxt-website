<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ URL::asset('favicon/site.webmanifest') }}">
    @yield('meta')
    <!-- Plugins Styles -->
    <link href="{{ URL::asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('plugins/flag-icons/css/flag-icons.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />

    <!-- Plugins Scripts -->
    <script src="{{ URL::asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/@fortawesome/fontawesome-pro/js/all.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/@popperjs/core/dist/umd/popper.js') }}"></script>

    <!-- Page styles -->
    @stack('styles')

    <!-- Page Scripts -->
    @stack('js')

    <!-- Admin styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="{{ URL::asset('css/admin/nobileUi.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset(mix('css/admin/admin.css')) }}" rel="stylesheet" />

    <!-- Admin scripts -->
    <script src="{{ URL::asset(URL::asset('js/admin/nobileUi.js')) }}" defer></script>
    <script src="{{ URL::asset(mix('js/admin/admin.js')) }}"></script>
</head>

<body class="{{ $cssNs }}" data-base-url="{{ url('/') }}">

    <script src="{{ URL::asset('js/admin/spinner.js') }}"></script>

    <div class="{{ $cssNs }} main-wrapper" id="app">

        <div class="page-wrapper">

            @include('admin.layouts.topbar')

            <div class="page-content">

                {{ $slot }}

            </div>

        </div>

    </div>

</body>
</html>
