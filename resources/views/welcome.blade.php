<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>{{ isset($title) ? $title : config('app.name') }} | Payment and Revenue Transaction</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A simple notes for transaction" name="description" />
        <meta content="IDStack" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

		<!-- App css -->
		<link href="{{ asset('assets/css/bootstrap-modern.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="{{ asset('assets/css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="{{ asset('assets/css/bootstrap-modern-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
		<link href="{{ asset('assets/css/app-modern-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

		<!-- icons -->
		<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading authentication-bg">
        <div class="mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">

                        <div class="text-center">
                            <svg id="Layer_1" class="svg-computer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 424.2 424.2">
                                <style>
                                    .st0{fill:none;stroke: #ffffff;stroke-width:5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                                </style>
                                <g id="Layer_2">
                                    <path class="st0" d="M339.7 289h-323c-2.8 0-5-2.2-5-5V55.5c0-2.8 2.2-5 5-5h323c2.8 0 5 2.2 5 5V284c0 2.7-2.2 5-5 5z"/>
                                    <path class="st0" d="M26.1 64.9h304.6v189.6H26.1zM137.9 288.5l-3.2 33.5h92.6l-4.4-33M56.1 332.6h244.5l24.3 41.1H34.5zM340.7 373.7s-.6-29.8 35.9-30.2c36.5-.4 35.9 30.2 35.9 30.2h-71.8z"/>
                                    <path class="st0" d="M114.2 82.8v153.3h147V82.8zM261.2 91.1h-147"/>
                                    <path class="st0" d="M124.5 105.7h61.8v38.7h-61.8zM196.6 170.2H249v51.7h-52.4zM196.6 105.7H249M196.6 118.6H249M196.6 131.5H249M196.6 144.4H249M124.5 157.3H249M124.5 170.2h62.2M124.5 183.2h62.2M124.5 196.1h62.2M124.5 209h62.2M124.5 221.9h62.2"/>
                                </g>
                            </svg>
                            <h3 class="mt-4 text-white">Please login to take advantage of our system capabilities.</h3>
                            <p class="text-white-50">We're making the system more awesome.</p>
                        </div> <!-- end /.text-center-->

                        <div class="mt-3 d-flex justify-content-center">
                            <a href="{{ route('login') }}" class="btn btn-light">Login</a>
                        </div>

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Footer Start -->
        <footer class="footer footer-alt text-white-50">
            2017 - <script>document.write(new Date().getFullYear())</script> &copy; Akunt by <a href="https://idstack.net" class="text-white">IDStack</a>
        </footer>
        <!-- end Footer -->

        <!-- Right Sidebar -->
        @include('layouts.partials._right-sidebar')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>

    </body>
</html>
