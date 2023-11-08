@extends('layouts.user')
@section('title')
    <title>تایید شماره همراه کاربران اتوکالا</title>
    <link rel="stylesheet" href="{{asset('site/css/responsive.css')}}">
@endsection
@section('main')
<div class="container">
    @include('sweet::alert')
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
                                            @include('error')

                                            <div class="form-account-title">
                                                <label for="token">کد فعال سازی پیامک شده را وارد کنید</label>
                                                <input type="text" name="code" required value=" " class="form-control" maxlength="7">
                                            </div>
                                            <div class="form-row-account">
                                                <button class="btn btn-primary btn-login">تایید کد</button>
                                            </div>
                                        </form>
                                        <div class="form-account-row">
                                            <div class="receive-verify-code">
                                                <p id="countdown-verify-end"><span class="day">0</span><span class="hour">0</span><span>: 2</span><span>59</span>
                                                    <i class="fa fa-clock-o"></i>
                                                </p>
                                            </div>
                                        </div>
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
@endsection
@section('script')
    <script src="{{asset('site/js/vendor/countdown.min.js')}}"></script>
    <script>
        setTimeout(function(){
            window.location.href = '{{url('login')}}';
        }, 300000);
    </script>
@endsection
