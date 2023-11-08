@extends('layouts.user')
@section('title')
    <title>به وبسایت اتوکالا خوش آمدید</title>
@endsection
@section('main')
<div class="container">
    <div class="row">
        <div class="col-lg">
            <section class="page-account-box">
                <div class="col-lg-6 col-md-6 col-xs-12 mx-auto">
                    <div class="ds-userlogin">
                        <div class="ds-userlogin text-center">
                            <a href="#">
                                <img src="{{asset('site/images/logo_load.png')}}" width="200px" alt="">
                            </a>
                            <div class="account-box">
                                <div class="Login-to-account mt-4">
                                    <div class="account-box-content">
                                        <h4 class="mb-2">{{ Auth::user()->name }} عزیز به اتوکالا خوش آمدید</h4>

                                            <div class="user-account-welcome">
                                                <img src="{{asset('site/images/man.png')}}">
                                            </div>
                                            <div class="made-account">
                                                <h2>{{ Auth::user()->name }} حساب کاربری شما در اتوکالا ساخته شد</h2>
                                                <p>اکنون می ‌توانید با تکمیل اطلاعات حساب کاربری خود به کلیه امکانات و سرویس‌های اتوکالا دسترسی داشته باشید</p>
                                            </div>
                                        @if(! Auth::user()->email)
                                            <div class="form-row-account">
                                                <a href="{{url('profile-user')}}" class="btn btn-primary btn-login">تکمیل حساب کاربری</a>
                                            </div>
                                        @elseif(Auth::user()->status == 1)
                                            <div class="form-row-account">
                                                <a href="{{url('profile-info')}}" class="btn btn-primary btn-login"> حساب کاربری</a>
                                            </div>
                                        @elseif(Auth::user()->status == 2)
                                            <div class="form-row-account">
                                                <a href="{{url('/')}}" class="btn btn-primary btn-login">ورود به وبسایت </a>
                                            </div>
                                        @endif
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
