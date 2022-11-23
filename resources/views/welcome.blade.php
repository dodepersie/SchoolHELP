<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logo/mini-logo.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo/mini-logo.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('landingPageAssets/css/styles.css') }}" rel="stylesheet" />

  </head>
  <body id="page-top" class="antialiased">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
    <div class="container px-5">
      <a class="navbar-brand fw-bold text-black" href="{{ url('/') }}">
        <img class="bg-cover" src="{{ asset('img/logo/mini-logo.png') }}" alt="logo">
        {{ config('app.name', 'Laravel') }}
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="bi-list"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
          <li class="nav-item"><a class="nav-link me-lg-3" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link me-lg-3" href="#features">Features</a></li>
          <li class="nav-item"><a class="nav-link me-lg-3" href="#about">About Us</a></li>
          <li class="nav-item"><a class="nav-link me-lg-3" href="#get-in-touch">Get in Touch!</a></li>
        </ul>
        @if (Route::has('login'))
          @auth
            <a class="btn btn-dark rounded-pill px-3 mb-2 mb-lg-0"
               href="
                      @if(Auth::user()->role_user == 'super_admin')
                        {{ route('dashboard_super_admin') }}
                      @elseif(Auth::user()->role_user == 'admin')
                        {{ route('dashboard_admin') }}
                      @elseif(Auth::user()->role_user == 'volunteer')
                        {{ route('dashboard_volunteer') }}
                      @endif">
              <span class="d-flex align-items-center">
                  <i class="bi bi-arrow-right me-2"></i>
                  <span class="small">Go Back</span>
              </span>
            </a>
          @else
            <a class="btn btn-outline-dark rounded-pill px-3 mb-2 mb-lg-0"
               href="{{ route('login') }}">
              <span class="d-flex align-items-center">
                  <i class="bi bi-box-arrow-in-right me-2"></i>
                  <span class="small">Login</span>
              </span>
            </a>
            <a class="btn btn-dark rounded-pill px-3 ms-2 mb-2 mb-lg-0"
               href="{{ route('register_volunteer') }}">
              <span class="d-flex align-items-center">
                  <i class="bi bi-person-plus-fill me-2"></i>
                  <span class="small">Register</span>
              </span>
            </a>
          @endauth
        @endif
      </div>
    </div>
  </nav>
  <!-- Mashead header-->
  <header class="masthead" id="home">
    <div class="container px-5">
      <div class="row gx-5 align-items-center">
        <div class="col-lg-6">
          <!-- Mashead text and app badges-->
          <div class="mb-lg-0 text-center text-lg-start">
            <h1 class="display-1 lh-1 mb-3">Provide More Educate More.</h1>
            <p class="lead fw-normal text-muted">Let's help thousands of children get the knowledge and resources they need, to help their learning process!</p>
            <div class="d-flex flex-column flex-lg-row align-items-center">
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <!-- Masthead device mockup feature-->
          <div class="masthead-device-mockup">
            <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
              <defs>
                <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                  <stop class="gradient-start-color" offset="0%"></stop>
                  <stop class="gradient-end-color" offset="100%"></stop>
                </linearGradient>
              </defs>
              <circle cx="50" cy="50" r="50"></circle></svg>
            <svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
              <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(120.42 -49.88) rotate(45)"></rect>
              <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(-49.88 120.42) rotate(-45)"></rect>
            </svg>
            <svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="50"></circle></svg>
            <div class="device-wrapper">
              <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                <div class="screen d-flex">
                  <img src="{{ asset('landingPageAssets/img/book.png') }}" alt="Book" class="align-self-center">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Quote/testimonial aside-->
  <aside class="text-center bg-gradient-primary-to-secondary">
    <div class="container px-5">
      <div class="row gx-5 justify-content-center">
        <div class="col-xl-8">
          <div class="h2 fs-1 text-white mb-4">
            “ Those who are happiest are those who do the most for others. ”
            <br>
            <br><span class="fs-3">― Booker T. Washington</span></div>
        </div>
      </div>
    </div>
  </aside>
  <!-- App features section-->
  <section id="features">
    <div class="container px-5">
      <div class="row gx-5 align-items-center">
        <div class="col-lg-8 order-lg-1 mb-5 mb-lg-0">
          <div class="container-fluid px-5">
            <div class="row gx-5">
              <div class="col-md-6 mb-5">
                <!-- Feature item-->
                <div class="text-center">
                  <i class="fas fa-school icon-feature text-gradient d-block mb-3"></i>
                  <h3 class="font-alt">Schools</h3>
                  <p class="text-muted mb-0">Schools can register and have lots of requests and offers!</p>
                </div>
              </div>
              <div class="col-md-6 mb-5">
                <!-- Feature item-->
                <div class="text-center">
                  <i class="fa fa-file-text-o icon-feature text-gradient d-block mb-3"></i>
                  <h3 class="font-alt">Requests</h3>
                  <p class="text-muted mb-0">School Admins can submit requests and accept offers submitted to requests!</p>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-6 mb-5 mb-md-0">
                <!-- Feature item-->
                <div class="text-center">
                  <i class="fas fa-hand-holding-heart icon-feature text-gradient d-block mb-3"></i>
                  <h3 class="font-alt">Offers</h3>
                  <p class="text-muted mb-0">Volunteers can submit offers to help students based on requests submitted!</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 order-lg-0">
          <!-- Features section device mockup-->
          <div class="features-device-mockup">
            <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
              <defs>
                <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                  <stop class="gradient-start-color" offset="0%"></stop>
                  <stop class="gradient-end-color" offset="100%"></stop>
                </linearGradient>
              </defs>
              <circle cx="50" cy="50" r="50"></circle>
            </svg>
            <svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
              <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(120.42 -49.88) rotate(45)"></rect>
              <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(-49.88 120.42) rotate(-45)"></rect>
            </svg>
            <svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="50"></circle></svg>
            <div class="device-wrapper">
              <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                <div class="screen d-flex">
                  <img src="{{ asset('landingPageAssets/img/child-book.png') }}" alt="Book" class="w-100 align-self-center">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Basic features section-->
  <section class="bg-light" id="about">
    <div class="container px-5">
      <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
        <div class="col-12 col-lg-5">
          <h2 class="display-4 lh-1 mb-4">Help the education of many people</h2>
          <p class="lead fw-normal text-muted mb-5 mb-lg-0">
            SchoolHELP is a system that has been proposed to allow schools to request for help from the general public.
            The schools may schedule tutorials for students who need remedial education, or request for resources such
            as mobile devices, network routers or personal computers. Volunteers can then check SchoolHELP for requests
            and make an offer to volunteer for any requests that they can fulfill, for example to help out in a tutorial
            or donate digital devices.
          </p>
        </div>
        <div class="col-sm-8 col-md-6">
          <div class="px-5 px-sm-0">
            <img class="img-fluid rounded-circle" src="{{ asset('landingPageAssets/img/young-woman.jpg') }}" alt="user" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Call to action section-->
  <section class="cta">
    <div class="cta-content">
      <div class="container px-5">
        <h2 class="text-white display-1 lh-1 mb-4">
          Stop scrolling.
          <br />
          Start giving.
        </h2>
        <a class="btn btn-outline-light py-3 px-4 rounded-pill" href="{{ route('register_volunteer') }}">
          <i class="bi bi-person-plus-fill me-1 fs-5"></i>
          Register
        </a>
      </div>
    </div>
  </section>
  <!-- App badge section-->
  <section class="bg-gradient-primary-to-secondary" id="get-in-touch">
    <div class="container px-5">
      <h2 class="text-center text-white font-alt mb-4">Get in touch now!</h2>
      <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
        @guest
          <a class="btn btn-outline-dark bg-white text-dark rounded-pill px-3 mb-2 mb-lg-0"
             href="{{ route('login') }}">
              <span class="d-flex align-items-center">
                  <i class="bi bi-box-arrow-in-right me-2"></i>
                  <span class="small">Login</span>
              </span>
          </a>
          <a class="btn btn-dark rounded-pill px-3 ms-2 mb-2 mb-lg-0"
             href="{{ route('register_volunteer') }}">
              <span class="d-flex align-items-center">
                  <i class="bi bi-person-plus-fill me-2"></i>
                  <span class="small">Register</span>
              </span>
          </a>
        @endauth
      </div>
    </div>
  </section>
  <!-- Footer-->
  <footer class="bg-black text-center py-5">
    <div class="container px-5">
      <div class="text-white-50 small">
        © <script>
          document.write(new Date().getFullYear())
        </script>,
        <strong>{{ config('app.name', 'Laravel') }}</strong>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="{{ asset('landingPageAssets/js/scripts.js') }}"></script>
  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
  </body>
</html>
