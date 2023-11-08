<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link rel="stylesheet" href="{{asset('site/css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/vendor/materialdesignicons.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/vendor/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/vendor/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/vendor/noUISlider.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/main.css')}}">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
@yield('main')


<script src="{{asset('site/js/vendor/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('site/js/vendor/bootstrap.js')}}"></script>
<script src="{{asset('site/js/vendor/owl.carousel.min.js')}}"></script>
<script src="{{asset('site/js/vendor/jquery.countdown.js')}}"></script>
<script src="{{asset('site/js/vendor/ResizeSensor.min.js')}}"></script>
<script src="{{asset('site/js/vendor/theia-sticky-sidebar.min.js')}}"></script>
<script src="{{asset('site/js/vendor/wNumb.js')}}"></script>
<script src="{{asset('site/js/vendor/nouislider.min.js')}}"></script>
<script src="{{asset('site/js/main.js')}}"></script>
@yield('script')
</body>
</html>
