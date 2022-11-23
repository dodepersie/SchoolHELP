<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- icon -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logo/mini-logo.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/logo/mini-logo.png') }}">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
{{--  <script src="{{ asset('js/app.js') }}" defer></script>--}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- Styles -->
{{--  <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
  <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
  <link href="{{ asset('css/custom/style.css') }}" rel="stylesheet">
  @yield('css')
</head>
<body>
<!-- Navbar -->
  @guest
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
      <div class="container">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="{{ url('/') }}">
          <img class="bg-cover" src="{{ asset('img/logo/mini-logo.png') }}" alt="logo">
          {{ config('app.name', 'Laravel') }}
        </a>
      </div>
    </nav>
  @else
    <div class="container position-sticky z-index-sticky top-0">
      <div class="row">
        <div class="col-12">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
            <div class="container-fluid">
              <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3" href="{{ url('/') }}">
                <img class="bg-cover" src="{{ asset('img/logo/mini-logo.png') }}" alt="Main logo">
                {{ config('app.name', 'Laravel') }}
              </a>
              <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
              </button>
              <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav mx-auto">
                </ul>
                <ul class="navbar-nav">
                  <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0">
                      <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                  </li>
                  <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0 text-black-50" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="ni ni-circle-08 me-sm-1"></i>
                      <span class="font-weight-bolder">{{ Auth::user()->username }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                      <li class="mb-2">
                        <a class="dropdown-item border-radius-md" href="javascript:;">
                          <div class="d-flex py-1">
                            <div class="my-auto">
                              <i class="ni ni-single-02 me-sm-2"></i>
                              <span class="font-weight-bold">Profile</span>
                            </div>
                          </div>
                        </a>
                      </li>
                      <li class="mb-2">
                        <a class="dropdown-item border-radius-md btn-sign-out"
                           href="javascript:;"
                           data-route="{{ route('logout') }}">
                          <div class="d-flex py-1">
                            <div class="my-auto">
                              <i class="ni ni-button-power me-sm-2"></i>
                              <span class="font-weight-bold">{{ __('Sign out') }}</span>
                            </div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>
      </div>
    </div>
  @endguest

  <main class="main-content mt-0">
    @yield('content')
  </main>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
{{--  <script src="{{ asset('assets/js/argon-dashboard.min.js?v=2.0.4') }}../"></script>--}}
{{--  <script src="{{ asset('js/custom/script.js') }}"></script>--}}
  @yield('js')
</body>
</html>
