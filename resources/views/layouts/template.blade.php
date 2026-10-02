<!doctype html>
<html lang="en">

<head>
  <title>@yield('title', 'Dashboard Sekolah')</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
    id="main-font-link" />
  <link rel="stylesheet" href="{{ asset('assets/fonts/phosphor/duotone/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" />
  <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" />
</head>

<body>
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <nav class="pc-sidebar">
    <div class="navbar-wrapper">
      <div class="m-header">
        <a href="#" class="b-brand fw-bolder text-decoration-none fs-3" style="color: #7c3aed;">
          SMKN 1 Tasikmalaya
        </a>
      </div>
      <div class="navbar-content">
        <ul class="pc-navbar">

          <li class="pc-item pc-caption">
            <label>Dashboard</label>
            <i class="ti ti-dashboard"></i>
          </li>
          <li class="pc-item">
            <a href="{{ route('admin.dashboard') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
              <span class="pc-mtext">Dashboard</span>
            </a>
          </li>

          <li class="pc-item pc-caption">
            <label>Menu Utama</label>
            <i class="ti ti-apps"></i>
          </li>

          <li class="pc-item">
            <a href="{{ route('profile_sekolah.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-building"></i></span>
              <span class="pc-mtext">Profil Sekolah</span>
            </a>
          </li>

          <li class="pc-item">
            <a href="{{ route('berita.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-news"></i></span>
              <span class="pc-mtext">Berita</span>
            </a>
          </li>

          <li class="pc-item">
            <a href="{{route('siswa.index')}}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-users"></i></span>
              <span class="pc-mtext">Data Siswa</span>
            </a>
          </li>

          <li class="pc-item">
            <a href="{{route('guru.index')}}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-id"></i></span>
              <span class="pc-mtext">Data Guru</span>
            </a>
          </li>

          <li class="pc-item">
            <a href="{{route('galeri.index')}}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-photo"></i></span>
              <span class="pc-mtext">Galeri</span>
            </a>
          </li>

          <li class="pc-item">
            <a href="{{route('ekstrakurikuler.index')}}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-activity"></i></span>
              <span class="pc-mtext">Ekstrakurikuler</span>
            </a>
          </li>

          @if(Auth::check() && Auth::user()->role === 'Admin')
            <li class="pc-item pc-caption">
              <label>Pengaturan</label>
              <i class="ti ti-settings"></i>
            </li>
            <li class="pc-item">
              <a href="{{ route('users.index') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-user-check"></i></span>
                <span class="pc-mtext">Manajemen User</span>
              </a>
            </li>
          @endif

        </ul>
      </div>
    </div>
  </nav>
  <header class="pc-header">
    <div class="header-wrapper">
      <div class="me-auto pc-mob-drp">
        <ul class="list-unstyled">
          <li class="pc-h-item header-mobile-collapse">
            <a href="#" class="pc-head-link head-link-secondary ms-0" id="sidebar-hide">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          <li class="pc-h-item pc-sidebar-popup">
            <a href="#" class="pc-head-link head-link-secondary ms-0" id="mobile-collapse">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="ms-auto">
        <ul class="list-unstyled">
          <li class="dropdown pc-h-item header-user-profile">
            <a class="pc-head-link head-link-primary dropdown-toggle arrow-none me-0 d-inline-flex align-items-center justify-content-center rounded-circle p-1"
              style="width: 42px; height: 42px;" data-bs-toggle="dropdown" href="#" role="button">
              <img src="{{ asset('assets/images/user/userpuple.png') }}" alt="user-image" class="user-avtar m-0"
                style="width: 100%; height: 100%; object-fit: cover;" />
            </a>
            <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
              <div class="dropdown-header">
                <h4 class="mb-0">Halo, {{ Auth::user()->username ?? 'User' }}</h4>
                <small class="text-muted">Role: {{ Auth::user()->role ?? '-' }}</small>
                <hr />
                <form action="/logout" method="GET" class="d-inline"
                  onsubmit="return confirm('Apakah Anda yakin ingin logout?')">
                  <form action="{{ route('logout') }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Apakah Anda yakin ingin logout?')">

                    @csrf
                    <button type="submit"
                      class="dropdown-item border-0 bg-transparent text-danger w-100 text-start p-0">
                      <i class="ti ti-logout me-2"></i>
                      <span>Logout</span>
                    </button>
                  </form>

              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </header>
  <div class="pc-container">
    <div class="pc-content">
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @yield('content')
    </div>
  </div>

  <footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
      <div class="row">
        <div class="col-sm-6 my-1">
          <p class="m-0">Profile Sekolah &copy; {{ date('Y') }}</p>
        </div>
      </div>
    </div>
  </footer>
  <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/icon/custom-font.js') }}"></script>
  <script src="{{ asset('assets/js/script.js') }}"></script>
  <script src="{{ asset('assets/js/theme.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
  <script>
    layout_change('light');
  </script>
  <script>
    font_change('Roboto');
  </script>
  <script>
    change_box_container('false');
  </script>
  <script>
    layout_caption_change('true');
  </script>
  <script>
    layout_rtl_change('false');
  </script>
  <script>
    preset_change('preset-1');
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      if (typeof layout_sidebar_change === 'function') {
        layout_sidebar_change('false');
      }
      document.body.classList.remove('pc-sidebar-hide');
    });
  </script>

  @stack('scripts')
</body>

</html>