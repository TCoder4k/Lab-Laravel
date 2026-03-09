<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Electro - Electronics Store')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('electro/css/bootstrap.min.css') }}">

    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('electro/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('electro/css/slick-theme.css') }}">

    <!-- nouislider CSS -->
    <link rel="stylesheet" href="{{ asset('electro/css/nouislider.min.css') }}">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('electro/css/font-awesome.min.css') }}">

    <!-- Electro CSS -->
    <link rel="stylesheet" href="{{ asset('electro/css/style.css') }}">

    @stack('styles')
</head>
<body>

    @include('partials.client_header')

    @yield('content')

    @include('partials.client_footer')

    <!-- jQuery -->
    <script src="{{ asset('electro/js/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('electro/js/bootstrap.min.js') }}"></script>
    <!-- Slick JS -->
    <script src="{{ asset('electro/js/slick.min.js') }}"></script>
    <!-- nouislider JS -->
    <script src="{{ asset('electro/js/nouislider.min.js') }}"></script>
    <!-- jQuery Zoom JS -->
    <script src="{{ asset('electro/js/jquery.zoom.min.js') }}"></script>
    <!-- Electro Main JS -->
    <script src="{{ asset('electro/js/main.js') }}"></script>

    @stack('scripts')
</body>
</html>
