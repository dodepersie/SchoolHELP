@extends('layouts.main')

@section('css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@section('js')
  <script type="text/javascript" charset="utf8"
          src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 mb-4">
      <div class="card">
        <div class="card-header pb-0">
          <h4>
            <i class="fa fa-user me-3"></i>
            <small>Profile</small>
          </h4>
        </div>
        <form method="POST"
              action="{{ route('profile_update', ['id_user' => \Illuminate\Support\Facades\Crypt::encrypt($user->id_user)]) }}"
              accept-charset="utf-8"
              enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <p class="text-uppercase text-sm">User Information</p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="input-full-name" class="form-control-label">{{ __('Full Name') }}</label>
                  <input id="input-full-name" class="form-control @error('full_name') is-invalid @enderror" type="text" name="full_name" value="{{ $user->full_name }}" required autocomplete="name">

                  @error('full_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="input-email" class="form-control-label">{{ __('Email Address') }}</label>
                  <input id="input-email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ $user->email }}" required autocomplete="email">

                  @error('email')
                  <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="input-phone-number" class="form-control-label">{{ __('Phone Number') }}</label>
                  <input id="input-phone-number" class="form-control @error('phone_number') is-invalid @enderror" type="tel" name="phone_number" value="{{ $user->phone_number }}" required autocomplete="tel">

                  @error('phone_number')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="input-password" class="form-control-label">{{ __('New Password') }}</label>
                  <input id="input-password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" autocomplete="new-password">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="input-password-confirm" class="form-control-label">{{ __('Confirm New Password') }}</label>
                  <input id="input-password-confirm" class="form-control" type="password" name="password_confirmation" autocomplete="new-password">
                </div>
              </div>
            </div>
            <hr class="horizontal dark">
            @if($user->role_user == "admin")
            <p class="text-uppercase text-sm">Administrator Information</p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="input-staff-id" class="form-control-label">{{ __('Staff ID') }}</label>
                  <input id="input-staff-id" class="form-control @error('staff_id') is-invalid @enderror" type="text" name="staff_id" value="{{ $user->staff_id }}" required>
                </div>

                @error('staff_id')
                <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="input-position" class="form-control-label">{{ __('Position') }}</label>
                  <input id="input-position" class="form-control @error('position') is-invalid @enderror" type="text" name="position" value="{{ $user->position }}" required>

                  @error('position')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>
            @elseif($user->role_user == "volunteer")
            <p class="text-uppercase text-sm">Volunteer Information</p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="input-dob" class="form-control-label">{{ __('Date of Birth') }}</label>
                  <input id="input-dob" class="form-control @error('date_of_birth') is-invalid @enderror" type="date" name="date_of_birth" value="{{ date('Y-m-d', strtotime($user->date_of_birth)) }}" required autocomplete="off">

                  @error('date_of_birth')
                  <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="input-occupation" class="form-control-label">{{ __('Occupation') }}</label>
                  <input id="input-occupation" class="form-control @error('occupation') is-invalid @enderror" type="text" name="occupation" value="{{ $user->occupation }}" required autocomplete="off">

                  @error('occupation')
                  <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            </div>
            @endif
            <button type="submit" class="btn btn-primary w-100 mt-3">
              {{ __('Update') }}
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-profile">
        <img src="{{ asset('img/bg-edu.jpg') }}" alt="Image placeholder" class="card-img-top">
        <div class="row justify-content-center">
          <div class="col-4 col-lg-4 order-lg-2">
            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
              <a href="javascript:;">
                <img src="{{ asset('img/user.png') }}" class="rounded-circle img-fluid border border-2 border-white">
              </a>
            </div>
          </div>
        </div>
        <div class="card-body pt-0">
          <div class="text-center mt-4">
            <h5 class="text-capitalize">
              {{ Auth::user()->full_name }}
              @if(Auth::user()->role_user == "volunteer")
                <span class="font-weight-light">, {{ Auth::user()->age }}</span>
              @endif
            </h5>
            <div class="text-sm">
              {{ Auth::user()->email }}
              <br>
              {{ Auth::user()->phone_number }}
            </div>
            @if(Auth::user()->role_user == "admin" || Auth::user()->role_user == "super_admin")
            <div class="h6 mt-4">
              {{ Auth::user()->staff_id }} - {{ Auth::user()->position }}
            </div>
            @if(Auth::user()->role_user == "admin")
            <div>
              {{ Auth::user()->school->sch_name }}
            </div>
            @endif
            @elseif(Auth::user()->role_user == "volunteer")
              <div class="h6 mt-4 text-capitalize">
                {{ Auth::user()->occupation }}
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
