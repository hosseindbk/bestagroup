@extends('layouts.user')
@section('title')
<title>ورورد کاربران اتوکالا</title>
@endsection
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <section class="page-account-box">
                    <div class="col-lg-6 col-md-6 col-xs-12 mx-auto">
                        <div class="ds-userlogin" style="text-align: center;">
                            <a href="#">
                                <img src="{{asset('site/images/logo_load.png')}}" width="200px" alt="">
                            </a>
                            <div class="account-box">
                                <div class="account-box-headline">
                                    <a href="{{url('loginemail')}}" class="login-ds active">
                                        <span class="title">ورود با ایمیل</span>
                                    </a>
                                    <a href="{{url('login')}}" class="login-ds ">
                                        <span class="title">ورود با رمز یکبارمصرف</span>
                                    </a>
                                    <a href="{{url('register')}}" class="register-ds">
                                        <span class="title">ثبت نام</span>
                                    </a>
                                </div>
                                <div class="Login-to-account mt-4">
                                    <div class="account-box-content">
                                        <form method="POST" action="{{ route('login-user') }}" class="form-account">
                                            @csrf
                                            <h4>ورود از طریق آدرس ایمیل </h4>
                                            <div class="form-account-title">
                                                <label class="float-right">ایمیل</label>
                                                <input type="email" name="email" class="text-left form-control @error('email') is-invalid @enderror">
                                            </div>
                                            <div class="form-account-title">
                                                <label class="float-right">رمز عبور</label>
                                                <input type="password" name="password" class="text-left form-control  @error('password') is-invalid @enderror">
                                            </div>
                                            <div class="form-row-account">
                                                <button class="btn btn-primary btn-login">ورود</button>
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
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
        </svg>
    </div>
@endsection
