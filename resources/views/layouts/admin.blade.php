<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    @yield('title')
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/web-fonts/font-awesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css-rtl/style/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css-rtl/colors/color.css')}}" id="theme" type="text/css" media="all">

    @yield('first')
</head>


@yield('main')
</body>
</html>
