@extends('layouts.user')
@section('title')
    <title>ورورد کاربران اتوکالا</title>
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
                                    <button type="button" class="btn btn-link"><a href="{{url('login')}}" style="float: revert;margin-right: 15px">بازگشت </a><i class="fa fa-arrow-left"></i></button>

                                </div>
                                <div class="Login-to-account mt-4">
                                    <div class="account-box-content">
                                        <form method="POST" action="{{ route('remember') }}" class="form-account">
                                            @csrf
                                            @include('error')

                                            <h4>فراموشی رمز عبور</h4>
                                            <div class="form-account-title">
                                                <label for="phone" class="float-right">شماره موبایل</label>
                                                <input type="text" name="phone" required value=" " class="form-control text-left @error('phone') is-invalid @enderror" >
                                            </div>
                                            <br>
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

