@extends('layouts.user')
@section('title')
    <title>تایید شماره همراه کاربران اتوکالا</title>
    <link rel="stylesheet" href="{{asset('site/css/responsive.css')}}">
@endsection
@section('main')
<div class="container">
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-lg">
            <section class="page-account-box">
                <div class="col-lg-6 col-md-6 col-xs-12 mx-auto">
                    <div class="ds-userlogin text-center">
                        <div class="account-box">
                            <div class="Login-to-account mt-4">
                                <div class="account-box-content">
                                    <div class="message-light">
                                        <div class="massege-light-send">
                                            برای شماره همراه  {{Session::get('phone')}} کد تایید ارسال گردید
                                            <div class="form-edit-number text-center">
                                                <a href="{{url()->previous()}}" class="edit-number-link">ویرایش شماره</a>
                                            </div>
                                        </div>
                                        <form method="POST" action="{{ route('verify.phone.token') }}" class="form-account">
                                            @csrf
                                            <div class="form-account-title">
                                                <label for="token">کد فعال سازی پیامک شده را وارد کنید</label>
                                                <input type="text" name="code" id="code_input" required value=" " class="form-control" maxlength="7">
                                            </div>
                                            <div class="form-row-account">
                                                <button class="btn btn-primary btn-login">تایید کد</button>
                                            </div>
                                        </form>
                                        <div id="countdown"></div>
{{--                                        <div class="form-account-row">--}}
{{--                                            <div class="receive-verify-code">--}}
{{--                                                <p id="countdown-verify-end"><span class="day">0</span><span class="hour">0</span><span>: 2</span><span>59</span>--}}
{{--                                                    <i class="fa fa-clock-o"></i>--}}
{{--                                                </p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>
@php
    $times = \App\Models\ActiveCode::select('expired_at')->whereUser_id(\Illuminate\Support\Facades\Session::get('auth.user_id'))->first();
    $time_now = jdate();
@endphp
@endsection
@section('script')
    <script src="{{asset('site/js/vendor/countdown.min.js')}}"></script>
    <script>
        setTimeout(function(){
            window.location.href = '{{url('login')}}';
        }, 300000);
    </script>
    @if ($errors->any())
        <script>
            // نمایش خطاها با SweetAlert
            Swal.fire({
                icon: 'error',
                title: 'خطا',
                html: '<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            });
        </script>
    @endif
    <script>
        function getRemainingTimeFromDatabase() {
            // کدی برای اتصال به بانک اطلاعاتی و دریافت زمان باقی مانده
            // مثلا:
            // const remainingTime = اتصال به بانک اطلاعاتی و دریافت زمان باقی مانده
            const remainingTime = {{jdate($times->expired_at)->getTimestamp() - jdate()->getTimestamp()}}; // فرضا زمان باقی مانده در ثانیه
            return remainingTime;
        }

        function displayRemainingTime() {
            let remainingTime = getRemainingTimeFromDatabase(); // دریافت زمان باقی مانده از بانک اطلاعاتی
            let intervalId;

            function updateRemainingTime() {
                const minutes = Math.floor(remainingTime / 60);
                const seconds = remainingTime % 60;
                document.getElementById('countdown').innerText = `زمان باقی مانده: ${minutes}:${seconds}`;

                if (remainingTime <= 0) {
                    clearInterval(intervalId);
                    document.getElementById('countdown').innerText = 'زمان اعتبار کد پیامک شده به پایان رسیده';
                    document.getElementById('code_input').disabled = true; // غیرفعال کردن ورودی

                } else {
                    remainingTime--;
                }
            }

            updateRemainingTime();
            intervalId = setInterval(updateRemainingTime, 1000);
        }

        displayRemainingTime();
    </script>
@endsection
