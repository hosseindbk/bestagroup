@extends('layouts.user')
@section('title')
    <title>بازیابی / دریافت رمز جدید</title>
@endsection
@section('main')
        <div class="container">
            @include('sweetalert::alert')
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
                                            <h4>بازیابی / دریافت رمز جدید</h4>
                                            <div class="form-account-title">
                                                <label for="phone" class="float-right">شماره موبایل</label>
                                                <input type="text" name="phone" required value=" " class="form-control text-left @error('phone') is-invalid @enderror" >
                                            </div>
                                            <div class="form-account-title">
                                                <label for="captcha" class="float-right">سوال امنیتی</label>
                                                <input type="text" name="captcha" required id="captcha" class="form-control @error('captcha') is-invalid @enderror"/>
                                            </div>
                                            <div class="form-account-title captcha">
                                                <label for="captcha_img" class="float-right"></label>
                                                <span>{!! captcha_img('math') !!}</span>
                                                <button type="button" class="btn btn-primery" class="reload" id="reload">
                                                    &#x21bb;
                                                </button>
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
@section('script')
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'خطا',
                timer: 2500,
                html: '<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            });
        </script>
    @endif
    <script type="text/javascript">
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
@endsection

