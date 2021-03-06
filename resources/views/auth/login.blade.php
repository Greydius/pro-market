@extends('system.master')

@section('content')
<main class="main">
 <div class="auth-container">
    <section class="login login-primary-page">
      <div class="container">
          {{ Breadcrumbs::render('auth') }}
        <div class="login-content">
          <h1 class="main-title">
            {{__("Sign in")}}
          </h1>
          @if(session('success'))
            <h4>
            {{session()->get('success')}}
             </h4>
          @endif
         
          <form novalidate="novalidate" method="POST" action="{{ route('login') }}" class="login_form">
            @csrf
            <div class="outer-service-auth-wrapper">
              @foreach(['facebook', 'google'] as $provider)
                  <a class="btn btn-link {{ $provider }}-auth outer-service-auth" href="{{ route('social.login', ['provider' => $provider]) }}">
                  <img src="{{ asset('assets/img/common/') }}/{{$provider}}_login.svg" alt="">
                <span>
                {{__("Login with")}} {{ ucwords($provider)}}
              </span></a>
              @endforeach
            </div>
            <label>
              
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>  {{ $message }}</strong>
                  </span>
              @enderror
              <input class="auth_control" placeholder="{{__('Email')}} " type="email" name="email">
            </label>
            <label>
              @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              <input class="auth_control" placeholder="{{__('Password')}}" type="password" name="password">
            </label>
            <button type="submit" class="submit-form default-button">
              OK
            </button>
            <div class="additional-auth-links">
              <div class="forgot-password">
                 @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                           {{__("I forgot password!")}} <span class="underlined">{{__("Rebuild it soon")}} </span>
                        </a>
                @endif
              </div>
              <div class="account-registration">
                <a href="{{ route('register') }}">
                   {{__("Don't have an account?")}} <span class="underlined">{{__("Register now")}}</span>
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</main>


<script>

$(document).ready(function(){

  $.extend($.validator.messages, {
      required: "<?php echo __("This field is required"); ?>",
      email: "<?php echo __('Please enter a valid email address.'); ?>"
});

$("form.login_form").validate({
    rules: {

      email: {
        required: true,
        email: true
      },
      password: {
        required: true
      }
    },
    ignore: [],
    errorPlacement: function (error, element) {
               $(error).insertAfter(element.prev(".error"));
           },

});

});
    </script>

@endsection
