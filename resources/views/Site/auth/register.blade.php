@extends('layouts.user')
@section('title')
<title>ثبت نام در اتوکالا</title>
<link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection
@section('main')
<div class="container">
    @include('sweet::alert')
    <div class="row">
            <div class="col-lg">
                <section class="page-account-box">
                    <div class="col-lg-6 col-md-6 col-xs-12 mx-auto">
                        <div class="ds-userlogin" style="text-align: center;">
                            <div class="account-box">
                                <div class="account-box-headline">
                                    <a href="{{url('login')}}" class="login-ds ">
                                        <span class="title">ورود به حساب کاربری</span>
                                    </a>
                                    <a href="{{url('register')}}" class="register-ds active">
                                        <span class="title">ثبت نام</span>
                                    </a>
                                </div>
                                <div class="Login-to-account mt-4">
                                    <div class="account-box-content">
                                        <h4>ثبت نام در اتوکالا</h4>
                                        <form method="POST" action="{{ route('register') }}" class="form-account text-right">
                                            @csrf
                                            @include('error')

                                            <div class="form-account-title">
                                                <label> شماره موبایل</label>
                                                <input type="number" name="phone" required class="form-control">
                                            </div>
                                            <div class="form-account-title">
                                                <label> نام و نام خانوادگی</label>
                                                <input type="text" name="name" required value="{{ old('name') }}" class="form-control" >
                                            </div>
                                            <div class="form-account-title">
                                                <label>رمز عبور</label>
                                                <input type="password" id="pass" required name="password" class="form-control" />
                                                <i class="fa fa-eye-slash" style="float: left;margin-top: -25px;margin-left: 15px;" onclick="togglePassword()"></i>

                                            </div>
                                            <div class="form-account-title">
                                                <label>تکرار رمز عبور</label>
                                                <input type="password" required name="password_confirmation" class="form-control" />
                                            </div>
                                            <div class="form-account-title">
                                                <label>انتخاب استان</label>
                                                <select name="state_id" required class="form-control select2" id="state_id">
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}">{{$state->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-account-title">
                                                <label>انتخاب شهرستان</label>
                                                <select name="city_id"  required class="form-control select2" id="city_id">
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-auth-row">
                                                <label class="ui-checkbox mt-1">
                                                    <input type="checkbox" required name="trace">
                                                    <span class="ui-checkbox-check"></span>
                                                </label>
                                                <label for="remember" class="remember-me mr-0">
                                                    <button type="button" class="btn btn-link" data-toggle="modal" data-target=".bd-example-modal-lg">شرایط قوانین</button>

                                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content" style="padding: 20px;">
                                                                <h3>تعریف انواع کاربر در سایت اتوکالا </h3>
                                                                <p style="font-size: 18px;">1. <strong style="color: #ef4343">کاربر عادی</strong> به شخصی گفته می‌شود که با شماره موبایل خود و کد فعاسازی پیامک شده  به سایت وارد می شود و امکان استفاده  از اطلاعات موجود در سایت و همچنین درج آگهی در بازارچه را خواهد داشت . آگهی های درج شده در سایت توسط کاربر عادی ،برای کلیه بازدید کنندگان از سایت قابل رویت خواهد بود </p>
                                                                <p style="font-size: 18px;">2. <strong style="color: #ef4343">	کاربر فروشگاه یا تامین کننده </strong> به شخصی گفته می‌شود که دارای یک کسب و کار صنفی مرتبط با قطعات و لوازم یدکی خودرو اعم از فروشگاه خرده فروشی یا عمده فروشی قطعات یدکی،شرکت تولیدی ،شرکت وارد کننده، شرکت توزیع کننده و نظایر آن باشد . این کاربر پس از ارائه مدارک لازم شامل تصویر محل کسب،اطلاعات تماس،تصویر مجوزهای فعالیت  و .... و احراز هویت توسط ادمین سایت اجازه فعالیت خواهد یافت .این نوع کاربر امکان ایجاد پروفایل کاربری خود ،معرفی کالاها با برندهای مختلف در قسمت کالاها ،تعریف برند جدید در سایت و همینطور درج آگهی عمده فروشی برای هم صنفان (B2B) علاوه بر آگهی تک فروشی برای مصرف کنندگان را خواهد داشت. توجه نمایید صرفا این نوع کاربر امکان مشاهده آگهی های عمده فروشی را خواهد داشت .</p>
                                                                <p style="font-size: 18px;">3. <strong style="color: #ef4343">	کاربر تعمیرگاه یا خدمات فنی </strong>به شخصی گفته می‌شود که دارای یک کسب و کار خدمات فنی مرتبط با خودرو اعم از تعمیرگاه مکانیکی ،جلوبندی سازی ،رادیاتور سازی ،باتری سازی ، اتوسرویس ،تون آپ ،صافکاری و نقاشی ، خدمات اسپرت و سیستم صوتی و نظایر آن باشد .این کاربر پس از ارائه مدارک لازم شامل تصویر محل فعالیت،اطلاعات تماس،تصویر مجوزهای فعالیت  و .... و احراز هویت توسط ادمین سایت ، اجازه فعالیت خواهد یافت .این نوع کاربر امکان ایجاد پروفایل کاربری ،معرفی حوزه خدمات قابل ارائه خود را خواهد داشت .همچنین امکان درج آگهی تک فروشی در بخش بازارچه را دارد  .</p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    استفاده از سایت اتوکالا را مطالعه نموده و با کلیه موارد آن موافقم.
                                                </label>
                                            </div>
                                            <div class="form-row-account">
                                                <button class="btn btn-primary btn-register">ثبت نام</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script  src="{{asset('admin/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2.js')}}"></script>

    <script>
        $(function(){
            $('#state_id').change(function(){
                $("#city_id option").remove();
                var id = $('#state_id').val();

                $.ajax({
                    url : '{{ route( 'state' ) }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function( result )
                    {
                        $.each( result, function(k, v) {
                            $('#city_id').append($('<option>', {value:k, text:v}));
                        });
                    },
                    error: function()
                    {
                        //handle errors
                        alert('error...');
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        function togglePassword(){
            x = document.getElementById("togglePassword")
            y = document.getElementById("pass")

            if (y.type ==="password") {
                y.type = 'text';
            } else{
                y.type="password";
                y.innerHTML = "Show"
            }
        }
    </script>
@endsection
