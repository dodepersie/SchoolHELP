@extends('layouts.app')

@section('content')
  <div class="page-header align-items-start min-vh-50 pt-7 pb-11 m-3 border-radius-lg">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 text-center mx-auto">
{{--          <div class="d-flex align-items-center justify-content-center mb-2 mt-5">--}}
{{--            <img class="d-inline mx-3" src="{{ asset('img/logo/mini-logo.png') }}" alt="Main logo">--}}
{{--            <h1 class="d-inline text-white ">SchoolHELP</h1>--}}
{{--          </div>--}}
          <img class="w-25 mb-3 mt-4" src="{{ asset('img/logo/logo.png') }}" alt="Main logo">
          <p class="text-lead text-white">Sign in with your account and help many children with their education.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-lg-n11 mt-md-n12 mt-n11 justify-content-center">
      <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
        <div class="card z-index-0 shadow-xl">
          <div class="card-body">
            <form role="form"
                  method="POST"
                  action="{{ route('login') }}"
                  accept-charset="UTF-8">
              @csrf
              <div class="mb-3">
                <label for="input-username">Username or email address</label>
                <input id="input-username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="input-password">Password</label>
                <input id="input-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">{{ __('Sign in') }}</button>
                <p class="text-sm mt-3 mb-0">Don't have an account? <a href="{{ route('register_volunteer') }}" class="text-dark font-weight-bolder">Register now</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
