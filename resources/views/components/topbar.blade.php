<header id="page-topbar">
  <div class="navbar-header">
    <div class="d-flex">
      <!-- LOGO -->
      <div class="navbar-brand-box">
        <a href="#" class="logo logo-dark">
          <span class="logo-sm">
            <img src="{{ asset('assets/skote/images/logo.svg') }}" alt="" height="22">
          </span>
          <span class="logo-lg">
            <img src="{{ asset('assets/skote/images/logo-dark.png') }}" alt="" height="17">
          </span>
        </a>

        <a href="#" class="logo logo-light">
          <span class="logo-sm">
            <img src="{{ asset('assets/skote/images/logo-light.svg') }}" alt="" height="22">
          </span>
          <span class="logo-lg">
            <img src="{{ asset('assets/skote/images/logo-light.png') }}" alt="" height="19">
          </span>
        </a>
      </div>

      <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
      </button>

      <!-- App Search-->
      {{-- <form class="app-search d-none d-lg-block">
        <div class="position-relative">
          <input type="text" class="form-control" placeholder="cari...">
          <span class="bx bx-search-alt"></span>
        </div>
      </form> --}}
    </div>

    <div class="d-flex">

      {{-- <div class="dropdown d-inline-block d-lg-none ms-2">
        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="mdi mdi-magnify"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

          <form class="p-3">
            <div class="form-group m-0">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div> --}}

      {{-- full screen --}}
      <div class="dropdown d-none d-lg-inline-block ms-1">
        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
          <i class="bx bx-fullscreen"></i>
        </button>
      </div>

      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="rounded-circle header-profile-user" src="{{ asset('assets/skote/images/users/avatar-1') }}.jpg" alt="Header Avatar">
          <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ auth()->user()->name }}</span>
          <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
          <!-- item-->
          <a class="dropdown-item" href="#">
            <i class="bx bx-user font-size-16 align-middle me-1"></i>
            <span key="t-profile">Profil</span>
          </a>
          <a class="dropdown-item d-block" href="#">
            <span class="badge bg-success float-end">3</span>
            <i class="bx bx-wrench font-size-16 align-middle me-1"></i>
            <span key="t-settings">Pengaturan</span>
          </a>
          <div class="dropdown-divider"></div>
          <a class="keluar dropdown-item text-danger" href=""><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
        </div>
      </div>

      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
          <i class="bx bx-cog bx-spin"></i>
        </button>
      </div>

    </div>
  </div>
</header>
