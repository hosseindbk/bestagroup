@extends('layouts.user')
@section('title')
<title>ثبت نام در سایت</title>
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
                                    <a href="{{url('login')}}" class="login-ds ">
                                        <span class="title">ورود به حساب کاربری</span>
                                    </a>
                                    <a href="{{url('register')}}" class="register-ds active">
                                        <span class="title">ثبت نام</span>
                                    </a>
                                </div>
                                <div class="Login-to-account mt-4">
                                    <div class="account-box-content">
                                        <h4>ثبت نام در سایت</h4>
                                        <form method="POST" action="{{ route('register') }}" class="form-account text-right">
                                            @csrf
                                            <div class="form-account-title">
                                                <label>نام و نام خانوادگی</label>
                                                <input type="text" name="name" autocomplete="off" required  class="form-control @error('name') is-invalid @enderror">
                                            </div>
                                            <div class="form-account-title">
                                                <label> شماره موبایل</label>
                                                <input type="number" name="phone" autocomplete="off" required  class="form-control @error('phone') is-invalid @enderror">
                                            </div>
                                            <div class="form-account-title">
                                                <label> نام کاربری</label>
                                                <input type="text" name="username" autocomplete="off" required  class="form-control @error('username') is-invalid @enderror" >
                                            </div>
                                            <div class="form-account-title">
                                                <label for="id_label_single"> نوع کاربری</label>
                                                <select name="type_user" class="form-control" required>
                                                        <option value="">انتخاب کنید</option>
                                                        @foreach(\App\Models\TypeUser::select('id' , 'title_fa')->whereIn('id' , [4,5,6,7])->get() as $type)
                                                        <option value="{{$type->id}}">{{$type->title_fa}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="form-account-title">
                                                <label>رمز عبور</label>
                                                <input type="password" id="pass" autocomplete="off" required  name="password" class="form-control" />
                                                <i class="fa fa-eye-slash" style="float: left;margin-top: -25px;margin-left: 15px;" onclick="togglePassword()"></i>

                                            </div>
                                            <div class="form-account-title">
                                                <label>تکرار رمز عبور</label>
                                                <input type="password" required name="password_confirmation" class="form-control" />
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
                                                                <h3>تعریف انواع کاربر در سایت  </h3>
                                                                <p style="font-size: 18px;text-align: justify;">1.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                                                <hr>
                                                                <p style="font-size: 18px;text-align: justify;">2.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                                                <hr>
                                                                <p style="font-size: 18px;text-align: justify;">3.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                                                <hr>
                                                                <p style="font-size: 18px;text-align: justify;">4.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    قوانین و مقررات وبسایت را مطالعه نموده و با آن موافقم.
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // پاک کردن مقادیر احتمالی از فیلدها
            document.querySelectorAll('input[type="text"], input[type="password"]').forEach(function (input) {
                input.value = " ";
            });
        });
    </script>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'خطا',
                html: '<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            });
        </script>
    @endif
@endsection
