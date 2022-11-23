@extends('layouts.app')

@section('content')
  <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 text-center mx-auto">
          <h1 class="text-white mb-2 mt-5">Welcome!</h1>
          <p class="text-lead text-white">Register now and help many children with their education.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-lg-n11 mt-md-n12 mt-n11 mb-5 justify-content-center">
      <div class="col-md-6">
        <div class="card z-index-0 shadow-xl">
          <div class="card-body">
            <form role="form"
                  method="POST"
                  action="{{ route('store_volunteer') }}"
                  accept-charset="utf-8">
              @csrf
              <div class="form-group">
                <label for="input-full-name" class="form-label">{{ __('Full Name') }}</label>
                <input id="input-full-name" class="form-control @error('full_name') is-invalid @enderror" type="text" name="full_name" value="{{ old('full_name') }}" required autocomplete="name" autofocus>

                @error('full_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="row justify-content-between">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="input-dob" class="form-label">{{ __('Date of Birth') }}</label>
                    <input id="input-dob" class="form-control @error('date_of_birth') is-invalid @enderror" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="off">

                    @error('date_of_birth')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="input-occupation" class="form-label">{{ __('Occupation') }}</label>
                    <input id="input-occupation" class="form-control @error('occupation') is-invalid @enderror" type="text" name="occupation" value="{{ old('occupation') }}" required autocomplete="off">

                    @error('occupation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row justify-content-between">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="input-email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="input-email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="input-phone-number" class="form-label">{{ __('Phone Number') }}</label>
                    <input id="input-phone-number" class="form-control @error('phone_number') is-invalid @enderror" type="tel" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="tel">

                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="input-username" class="form-label">{{ __('Username') }}</label>
                <input id="input-username" class="form-control @error('username') is-invalid @enderror" type="text" name="username" value="{{ old('username') }}" required autocomplete="username">

                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="input-password" class="form-label">{{ __('Password') }}</label>
                <input id="input-password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="input-password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="input-password-confirm" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
              </div>
              <div class="form-group text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100">
                    {{ __('Register') }}
                  </button>
                <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{ route('login') }}" class="text-dark font-weight-bolder">Sign in</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
