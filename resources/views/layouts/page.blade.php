<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Sentje') }}</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <link href="{{ asset('css/agency.css') }}" rel="stylesheet">
        <link href="{{ asset('css/agency.min.css') }}" rel="stylesheet">
    </head>
    <body id="page-top">
        @include('partials.header')

        @yield('content')

        @include('partials.footer')

        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

        <!-- Plugin JavaScript -->
        <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for this template -->
        <script src="{{ asset('js/agency.min.js') }}"></script>
    </body>
</html>
