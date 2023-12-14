<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>	
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('user/images/favicon.ico')}}">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('user/css/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('user/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('user/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('user/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('user/css/chosen.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('user/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('user/css/color-01.css')}}">
        
    </head>

    <body class="font-sans text-gray-900 antialiased">

        @include('layouts.user.navigation')

        <main>
            @yield('content')
        </main>

        @include('layouts.user.footer')


        <script src="{{asset('user/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
        <script src="{{asset('user/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('user/js/jquery.flexslider.js')}}"></script>
        <script src="{{asset('user/js/chosen.jquery.min.js')}}"></script>
        <script src="{{asset('user/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('user/js/jquery.countdown.min.js')}}"></script>
        <script src="{{asset('user/js/jquery.sticky.js')}}"></script>
        <script src="{{asset('user/js/functions.js')}}"></script>
        <script src="{{asset('user/js/auth.js')}}"></script>


         <!-- sweet alert -->
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <script src="{{asset('user/js/auth.js')}}"></script>
    </body>
</html>
