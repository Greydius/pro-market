@extends('system.master')

@section('content')
<main class="main">
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
              @foreach(['facebook', 'google'] as $provider)
                  <a class="btn btn-link {{ $provider }}-auth outer-service-auth" href="{{ route('social.login', ['provider' => $provider]) }}">
                  <img src="{{ asset('assets/img/common/fb.svg') }}" alt="">
                <span>
                Войти через {{ ucwords($provider)}}
              </span></a>
              @endforeach
            </div>
            <label>
              <span class=" error help-block">
                                <strong>{{ $errors->first('email') }}</strong>
              </span>
              <input class="auth_control" placeholder="Электронная почта" type="email" name="email" >
            </label>
            <label>
               <span class=" error help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
              <input class="auth_control" minlength="8" placeholder="Пароль" type="password" name="password">
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
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function() {

        var app = {
            DOM: {},
            init: function () {

                // only applies to register form
                if (window.location.pathname == '/login') {

                    this.DOM.form = $('form');
                    this.DOM.form.email = this.DOM.form.find('input[name="email"]');
                    this.DOM.form.pwd   = this.DOM.form.find('input[name="password"]');


                    this.DOM.form.email.group = this.DOM.form.email.prev('span.error');
                    this.DOM.form.pwd.group = this.DOM.form.pwd.prev('span.error');
                    this.DOM.form.submit( function(e) {
                        e.preventDefault();

                        var self = this; // native form object

                        error = {};

                        app.DOM.form.email.group.find('strong').text('');
                        app.DOM.form.pwd.group.find('strong').text('');

                        app.DOM.form.email.group.removeClass('has-error');
                        app.DOM.form.pwd.group.removeClass('has-error');

                        var user = {};
                        user.email = app.DOM.form.email.val();
                        user.password = app.DOM.form.pwd.val();

                        var request = $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '/login',
                            type: 'POST',
                            contentType: 'application/json',
                            data: JSON.stringify(user)
                        });
                        request.done( function(data)
                        {
                            // native form submit
                            self.submit();
                        });
                        request.fail( function(jqXHR)
                        {
                            error = jqXHR.responseJSON;
                            // alert(error.errors.email);
                            console.log(error.errors);
                            
                            if (error.errors.email) {
                                app.DOM.form.email.group.find('strong').text(error.errors.email[0]);
                                app.DOM.form.email.group.addClass('has-error');
                            }
                            if (error.errors.password) {
                                app.DOM.form.pwd.group.find('strong').text(error.errors.password[0]);
                                app.DOM.form.pwd.group.addClass('has-error');
                            }

                        });

                    });
                }
            }
        }

        app.init();

    });
    </script>

@endsection
