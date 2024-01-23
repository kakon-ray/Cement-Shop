<!doctype html>
<html lang="en">


<!-- Mirrored from risingtheme.com/html/rokon-demo/rokon/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Jan 2024 14:21:38 GMT -->
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="description" content="Morden Bootstrap HTML5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    
   <!-- ======= All CSS Plugins here ======== -->
  <link rel="stylesheet" type="text/css" href="{{asset('user/css/plugins/swiper-bundle.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('user/css/plugins/glightbox.min.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800&amp;family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap" rel="stylesheet">

  <!-- Plugin css -->
  <!-- <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css"> -->
  
  <!-- Custom Style CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('user/css/style.css')}}">
</head>

    <body class="font-sans text-gray-900 antialiased">

        @include('layouts.user.navigation')

        <main>
            @yield('content')
        </main>

        @include('layouts.user.footer')

        <button aria-label="scroll top btn" id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>
        <script src="{{asset('user/js/plugins/swiper-bundle.min.js')}}" defer="defer"></script>
        <script src="{{asset('user/js/plugins/glightbox.min.js')}}" defer="defer"></script>
      
        <!-- Customscript js -->
        <script src="{{asset('user/js/script.js')}}" defer="defer"></script>

         <!-- sweet alert -->
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{asset('user/js/auth.js')}}"></script>
    </body>
</html>
