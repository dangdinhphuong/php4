<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Suruchi - Fashion</title>
    <meta name="description" content="Suruchi - Fashion">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper-bundle.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/plugins/glightbox.min.css')}}">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Plugin css -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>

<body>
<!-- Start preloader -->
<div id="preloader">
    <div id="ctn-preloader" class="ctn-preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                    <span data-text-preloader="L" class="letters-loading">
                        L
                    </span>

                <span data-text-preloader="O" class="letters-loading">
                        O
                    </span>

                <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>

                <span data-text-preloader="D" class="letters-loading">
                        D
                    </span>

                <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>

                <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>

                <span data-text-preloader="G" class="letters-loading">
                        G
                    </span>
            </div>
        </div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
</div>
<!-- End preloader -->

<!-- Start header area -->
@include('client.components.header')
<!-- End header area -->

@yield('content')

<!-- Start footer section -->
@include('client.components.footer')

<button id="scroll__top">
    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
              d="M112 244l144-144 144 144M256 120v292"/>
    </svg>
</button>
<!-- All Script JS Plugins here  -->
<script src="{{asset('assets/js/vendor/popper.js')}}" defer="defer"></script>
<script src="{{asset('assets/js/vendor/bootstrap.min.js')}}" defer="defer"></script>
<script src="{{asset('assets/js/plugins/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/glightbox.min.js')}}"></script>
<!-- Customscript js -->
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('client/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('client/js/function.js')}}"></script>
@if(session('message'))
    <script>
        swal("Hành động", " {!! session('message') !!}", "success", {
            button: "OK",
        })
    </script>
@endif

@if(session('error'))
    <script>
        swal("Hành động", " {!! session('error') !!}", "error", {
            button: "OK",
        })
    </script>
@endif

@yield('javascript')
</body>

</html>
