<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Template File --}}
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/all.min.js')}}" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="{{route('dashboard')}}">{{ config('app.name', 'QMS') }}</a>
      <!-- Sidebar Toggle-->
      <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
      <!-- Navbar Search-->
      <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
          <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
              <button class="btn btn-dark" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
          </div>
      </form>
      <!-- Navbar-->
      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#!">Settings</a></li>
                  <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
                </li>
              </ul>
          </li>
      </ul>
  </nav>
  <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
          <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
              <div class="sb-sidenav-menu">
                  <div class="nav">
                      <div class="sb-sidenav-menu-heading">Core</div>
                      <a class="nav-link" href="{{ route("dashboard")}}">
                          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                          Dashboard
                      </a>
                      <div class="sb-sidenav-menu-heading">Interface</div>
                      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                          <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                          User Management
                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                      </a>
                      <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                          <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="#">Add User</a>
                              <a class="nav-link" href="#">Roles</a>
                              <a class="nav-link" href="#">Permission</a>
                          </nav>
                      </div>
                  </div>
              </div>
              <div class="sb-sidenav-footer">
                  <div class="small">Logged in as:</div>
                  {{ Auth::user()->name }}
              </div>
          </nav>
      </div>
      </div>
      <div id="layoutSidenav_content">
          <main>
              <div class="container-fluid px-4">
                  {{-- <h1 class="mt-4">Dashboard</h1>
                  <ol class="breadcrumb mb-4">
                      <li class="breadcrumb-item active">Dashboard</li>
                  </ol> --}}
                  @yield('content')
              </div>
          </main>
          <footer class="py-4 bg-light mt-auto">
              <div class="container-fluid px-4">
                  <div class="d-flex align-items-center justify-content-between small">
                      <div class="text-muted">Copyright &copy; RGoB 2022</div>
                  </div>
              </div>
          </footer>
      </div>
  </div>
  <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
  <script src="{{asset('assets/js/scripts.js')}}"></script>
</body>
</html>