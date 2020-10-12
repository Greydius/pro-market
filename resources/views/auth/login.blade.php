@extends('system.master')

@section('content')
 <div class="auth-container">
    <section class="login login-primary-page">
      <div class="container">
        <div class="bread-crumbs">
          <ul class="d-flex">
            <li class="bread-crumb-link">
              <a href="#">
                Магазин
              </a>
            </li>
            <li class="bread-crumb-link">
              Вход
            </li>
          </ul>
        </div>
        <div class="login-content">
          <h1 class="main-title">
            Войти в систему
          </h1>
          <form method="POST" action="{{ route('login') }}">
                        @csrf
            <div class="outer-service-auth-wrapper">
              <a class="facebook-auth outer-service-auth" href="#">
                <img src="{{ asset('assets/img/common/fb.svg') }}" alt="">
                <span>
                Войти через Facebook
              </span>
              </a>
              <a href="#" class="google-auth outer-service-auth">
                <img src="{{ asset('assets/img/common/google.svg') }}" alt="">
                <span>
                Войти через Google
              </span>
              </a>
            </div>
            <label>
              <input class="auth_control" placeholder="Электронная почта" type="email" name="email">
            </label>
            <label>
              <input class="auth_control" placeholder="Пароль" type="password" name="password">
            </label>
            <button type="submit" class="submit-form default-button">
              OK
            </button>
            <div class="additional-auth-links">
              <div class="forgot-password">
                 @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                           Я забыл пароль! <span class="underlined"> Восстановить его скорее</span>
                        </a>
                @endif
              </div>
              <div class="account-registration">
                <a href="{{ route('register') }}">
                  Нет аккаунт? <span class="underlined"> Зарегистрироваться</span>
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>

@endsection