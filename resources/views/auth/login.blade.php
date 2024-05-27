@extends('auth-layout')
@section('class-body', 'log_in_page')
@section('content')
<div id="log-in" class="site-form log-in-form">

    <div id="log-in-head">
      <h1>ورود</h1>
      <div id="logo"><a href="01-home.html"><img src="{{ Vite::asset('resources/img/logo.png') }}" alt=""></a></div>
  </div>

  <div class="form-output">
    <x-validation-errors></x-validation-errors>
      <form action="{{ route('login.store') }}" method="post">
        @csrf
          <div class="form-group label-floating">
              <label class="control-label">ایمیل</label>
              <input name="email" class="form-control" placeholder="" type="email">
          </div>

          <div class="form-group label-floating">
              <label class="control-label">رمز عبور</label>
              <input name="password" class="form-control" placeholder="" type="password">
          </div>

          <div class="remember">
              <div class="checkbox">
                  <label>
                      <input name="remember" type="checkbox">
                          مرا به خاطر بسپار
                  </label>
              </div>
              <a id="forget-password-key-in-log-in-page" href="{{ route('password.request.create') }}" class="forgot">فراموشی رمز عبور</a>
          </div>



          <button class="btn btn-lg btn-primary full-width" type="submit">ورود</button>
            <div class="or"></div>

          {{-- <a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fa fa-facebook" aria-hidden="true"></i>ورود با فیس بوک</a> --}}

          {{-- <a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fa fa-twitter" aria-hidden="true"></i>ورود با توییتر</a> --}}


          <p>آیا شما یک حساب کاربری ندارید؟ <a class="register-key-in-login-page" href="{{ route('register.create') }}">ثبت نام کنید!</a> </p>
      </form>
  </div>
</div>

@endsection
